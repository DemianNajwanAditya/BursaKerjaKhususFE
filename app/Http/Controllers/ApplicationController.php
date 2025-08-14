<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\JobPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Mail\StatusLamaranMail;

class ApplicationController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of applications for the company
     */
    public function index()
    {
        return $this->indexForCompany();
    }

    /**
     * Display a listing of applications for the company
     */
    public function indexForCompany()
    {
        $company = Auth::user()->company;

        $applications = Application::whereHas('jobPost', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->with(['user', 'jobPost'])->latest()->paginate(10);

        return view('company.applications', compact('applications'));
    }

    /**
     * Preview PDF file
     */
    public function previewPdf(Application $application)
    {
        // Cek hak akses - company hanya bisa akses aplikasi untuk job mereka
        $user = Auth::user();
        $company = $user->company;
        
        if (!$company || $application->jobPost->company_id !== $company->id) {
            abort(403, 'Unauthorized action.');
        }

        $filePath = storage_path('app/public/' . $application->cv_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->file($filePath);
    }

    /**
     * Download PDF file
     */
    public function downloadPdf(Application $application)
    {
        // Cek hak akses - company hanya bisa akses aplikasi untuk job mereka
        $user = Auth::user();
        $company = $user->company;
        
        if (!$company || $application->jobPost->company_id !== $company->id) {
            abort(403, 'Unauthorized action.');
        }

        $filePath = storage_path('app/public/' . $application->cv_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download($filePath, 'CV_' . $application->user->name . '.pdf');
    }

    /**
     * Store a new application (for students)
     */
    public function store(Request $request, JobPost $job)
    {
        $request->validate([
            'cv' => 'nullable|mimes:pdf|max:2048',
            'cover_letter' => 'nullable|string|max:2000',
        ]);

        $user = Auth::user();

        // Prevent duplicate applications
        if (Application::where('user_id', $user->id)
            ->where('job_post_id', $job->id)
            ->exists()) {
            return back()->with('error', 'You already applied to this job.');
        }

        $cvPath = $request->hasFile('cv')
            ? $request->file('cv')->store('cvs', 'public')
            : $user->cv_path;

        $application = Application::create([
            'user_id' => $user->id,
            'job_post_id' => $job->id,
            'cv_path' => $cvPath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        // Null safety checks for email notification
        $companyName = $job->company ? $job->company->name : 'Unknown Company';
        $jobTitle = $job->title ?? 'Unknown Position';

        // Kirim email notifikasi Apply
        try {
            Mail::to($user->email)->send(new StatusLamaranMail(
                $user->name,
                $jobTitle,
                $companyName,
                'apply',
                route('applications.show', $application->id)
            ));
        } catch (\Exception $e) {
            // Log error but don't break the application
            \Log::error('Failed to send email notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Application submitted successfully.');
    }

    /**
     * Update application status + send email
     */
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        // Pastikan hanya perusahaan pemilik job yang bisa update
        $company = Auth::user()->company;
        if ($application->jobPost->company_id !== $company->id) {
            abort(403, 'Unauthorized action.');
        }

        // Update status
        $application->update(['status' => $request->status]);

        // Kirim email notifikasi status diterima/ditolak
        Mail::to($application->user->email)->send(new StatusLamaranMail(
            $application->user->name,
            $application->jobPost->title,
            $application->jobPost->company->name,
            $application->status,
            route('applications.show', $application->id)
        ));

        return redirect()->route('company.applications.index')
            ->with('success', 'Application status updated successfully & email notification sent.');
    }

    /**
     * Get applications for a specific job
     */
    public function indexForJob(JobPost $job)
    {
        $this->authorize('view', $job);

        $applications = $job->applications()->with('user')->latest()->get();

        return view('company.job-applications', compact('applications', 'job'));
    }

    /**
     * Show a specific application (for link in email)
     */
    public function show(Application $application)
    {
        // Cek hak akses: pelamar bisa lihat aplikasinya sendiri, perusahaan bisa lihat aplikasinya
        if (Auth::id() !== $application->user_id &&
            Auth::user()->company_id !== $application->jobPost->company_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('applications.show', compact('application'));
    }
}
