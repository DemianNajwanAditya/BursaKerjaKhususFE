<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\NotifikasiController;
use App\Mail\StatusLamaranMail;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Public job list
Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobPostController::class, 'show'])->name('jobs.show');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard umum
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 🔹 Tambahan: route untuk detail lamaran
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])
        ->name('applications.show');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::view('/users', 'admin.users')->name('users');
    });

    /*
    |--------------------------------------------------------------------------
    | Company Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:company'])->prefix('company')->name('company.')->group(function () {
        Route::view('/', 'company.dashboard')->name('dashboard');

        // Job management
        Route::resource('jobs', JobPostController::class)->except(['index', 'show']);

        // Application management
        Route::get('/applications', [ApplicationController::class, 'indexForCompany'])->name('applications.index');
        Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])
            ->name('applications.updateStatus');
    });

    /*
    |--------------------------------------------------------------------------
    | Student Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:student'])->group(function () {
        Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');
    });

    /*
    |--------------------------------------------------------------------------
    | Profile Management
    |--------------------------------------------------------------------------
    */
    Route::get('/profile/upload-cv', [ProfileController::class, 'showUploadForm'])->name('profile.upload-cv');
    Route::post('/profile/upload-cv', [ProfileController::class, 'uploadCv'])->name('profile.upload-cv.store');
});

/*
|--------------------------------------------------------------------------
| Notifikasi & Email Testing
|--------------------------------------------------------------------------
*/
Route::post('/kirim-notifikasi', [NotifikasiController::class, 'kirim']);

// Test kirim email manual
Route::get('/test-email', function () {
    $toEmail = 'aevan354@gmail.com'; // ganti sesuai email tujuan
    Mail::to($toEmail)->send(new StatusLamaranMail(
        'Budi',
        'Programmer',
        'PT Maju Jaya',
        'apply', // apply / accepted / rejected
        url('/dashboard')
    ));

    return "✅ Email test sudah dikirim ke $toEmail";
});
