<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobPost;

class ApplicationController extends Controller
{
    /**
     * Display a listing of applications for the company
     */
    public function indexForCompany()
    {
        $company = auth()->user()->company;
        $applications = Application::whereHas('jobPost', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->with(['user', 'jobPost'])->latest()->paginate(10);

        return view('company.applications', compact('applications'));
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

        $user = auth()->user();

        // Prevent duplicate applications
        if (Application::where('user_id', $user->id)
            ->where('job_post_id', $job->id)
            ->exists()) {
            return back()->with('error', 'You already applied to this job.');
        }

        $cvPath = $request->hasFile('cv')
            ? $request->file('cv')->store('cvs', 'public')
            : $user->cv_path;

        Application::create([
            'user_id' => $user->id,
            'job_post_id' => $job->id,
            'cv_path' => $cvPath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }

    /**
     * Update application status
     */
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        // Ensure the application belongs to a job post owned by the authenticated company
        $company = auth()->user()->company;
        if ($application->jobPost->company_id !== $company->id) {
            abort(403, 'Unauthorized action.');
        }

        $application->update(['status' => $request->status]);

        return redirect()->route('company.applications.index')
            ->with('success', 'Application status updated successfully.');
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
}
