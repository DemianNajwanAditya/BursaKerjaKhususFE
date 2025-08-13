<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\NotifikasiController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes - Accessible for all users (guest or authenticated)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Public job listings
Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobPostController::class, 'show'])->name('jobs.show');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // General dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Company Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:company'])->prefix('company')->name('company.')->group(function () {
        Route::get('/', function () {
            return view('company.dashboard');
        })->name('dashboard');
        
        // Job management
        Route::resource('jobs', JobPostController::class)->except(['index', 'show']);
        
        // Application management
        Route::get('/applications', [ApplicationController::class, 'indexForCompany'])
            ->name('applications.index');
        Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])
            ->name('applications.updateStatus');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Student Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:student'])->group(function () {
        // Apply for jobs
        Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])
            ->name('jobs.apply');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Profile Management
    |--------------------------------------------------------------------------
    */
    Route::get('/profile/upload-cv', [ProfileController::class, 'showUploadForm'])
        ->name('profile.upload-cv');
    Route::post('/profile/upload-cv', [ProfileController::class, 'uploadCv'])
        ->name('profile.upload-cv.store');
});

//status lamaran email
Route::get('/tes-notif', function () {
    return view('emails.status-lamaran', [
        'nama' => 'Evan Arya',
        'posisi' => 'Web Developer',
        'perusahaan' => 'PT Maju Jaya',
        'tipe' => 'apply',
        'url' => url('/dashboard')
    ]);
});

Route::post('/kirim-notif', [NotifikasiController::class, 'kirim']);

