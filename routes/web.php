<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard umum (hanya login & verified)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin routes
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Contoh route admin lain
        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');
    });

// Company routes
Route::middleware(['auth', 'verified', 'role:company'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {
        Route::get('/', function () {
            return view('company.dashboard');
        })->name('dashboard');

        // Contoh route company lain
        Route::get('/jobs', function () {
            return view('company.jobs');
        })->name('jobs');
    });

// Upload CV (hanya login)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/upload-cv', [ProfileController::class, 'showUploadForm'])->name('profile.upload-cv');
    Route::post('/profile/upload-cv', [ProfileController::class, 'uploadCv'])->name('profile.upload-cv.store');
});

// Route upload CV tambahan
Route::post('/upload-cv', [ProfileController::class, 'uploadCV'])->name('upload.cv');
