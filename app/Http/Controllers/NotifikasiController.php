<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log; // Menambahkan import untuk Log

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusLamaranMail;

class NotifikasiController extends Controller
{
    /**
     * Kirim notifikasi email
     * $tipe = apply | diterima | ditolak | verifikasi
     */
    public function kirim(Request $request)
    {
        // Data dari request (bisa dari form, API, atau otomatis dari sistem)
        $nama = $request->input('nama');
        $posisi = $request->input('posisi');
        $perusahaan = $request->input('perusahaan');
        $tipe = $request->input('tipe');
        $email = $request->input('email');
        $url = $request->input('url', url('/dashboard')); // default ke dashboard

        // Kirim email
        Mail::to($email)->send(new StatusLamaranMail(
            $nama,
            $posisi,
            $perusahaan,
            $tipe,
            $url
        ));

        return response()->json([
            'status' => 'success',
            'message' => 'Email notifikasi berhasil dikirim ke ' . $email
        ]);
    }

    /**
     * Contoh trigger otomatis saat lamaran diajukan
     */
    public function lamaranDiajukan($user, $job)
    {
        if (!$user || !$job || !$job->company) {
            return;
        }

        try {
            Mail::to($user->email)->send(new StatusLamaranMail(
                $user->name ?? 'User',
                $job->title ?? 'Unknown Position',
                $job->company->name ?? 'Unknown Company',
                'apply',
                url('/dashboard')
            ));
        } catch (\Exception $e) {
            Log::error('Failed to send application notification: ' . $e->getMessage());
        }
    }

    /**
     * Contoh trigger otomatis saat status lamaran berubah
     */
    public function updateStatusLamaran($user, $job, $status)
    {
        if (!$user || !$job || !$job->company) {
            return;
        }

        $tipe = $status == 'accepted' ? 'diterima' : 'ditolak';

        try {
            Mail::to($user->email)->send(new StatusLamaranMail(
                $user->name ?? 'User',
                $job->title ?? 'Unknown Position',
                $job->company->name ?? 'Unknown Company',
                $tipe,
                url('/dashboard')
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send status update notification: ' . $e->getMessage());
        }
    }

    /**
     * Contoh trigger otomatis verifikasi perusahaan
     */
    public function verifikasiPerusahaan($company)
    {
        if (!$company || !$company->email) {
            return;
        }

        try {
            Mail::to($company->email)->send(new StatusLamaranMail(
                $company->owner_name ?? $company->name ?? 'Company Owner',
                '-', // posisi tidak relevan
                $company->name ?? 'Unknown Company',
                'verifikasi',
                url('/dashboard')
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send verification notification: ' . $e->getMessage());
        }
    }
}
