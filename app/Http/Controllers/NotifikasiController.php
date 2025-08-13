<?php

namespace App\Http\Controllers;

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
        Mail::to($user->email)->send(new StatusLamaranMail(
            $user->name,
            $job->title,
            $job->company->name,
            'apply',
            url('/dashboard')
        ));
    }

    /**
     * Contoh trigger otomatis saat status lamaran berubah
     */
    public function updateStatusLamaran($user, $job, $status)
    {
        $tipe = $status == 'accepted' ? 'diterima' : 'ditolak';

        Mail::to($user->email)->send(new StatusLamaranMail(
            $user->name,
            $job->title,
            $job->company->name,
            $tipe,
            url('/dashboard')
        ));
    }

    /**
     * Contoh trigger otomatis verifikasi perusahaan
     */
    public function verifikasiPerusahaan($company)
    {
        Mail::to($company->email)->send(new StatusLamaranMail(
            $company->owner_name,
            '-', // posisi tidak relevan
            $company->name,
            'verifikasi',
            url('/dashboard')
        ));
    }
}
