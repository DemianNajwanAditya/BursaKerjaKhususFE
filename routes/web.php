<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminJobPostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LowonganController;

use Illuminate\Support\Facades\Auth;

// ================== PUBLIC ROUTES ==================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/statistics', [HomeController::class, 'statistics'])->name('statistics');
Route::get('/achievements', [HomeController::class, 'achievements'])->name('achievements');
Route::get('/info', [HomeController::class, 'info'])->name('info');

// Temporary route to check authentication
Route::get('/check-auth', function () {
    return Auth::check() ? 'User is authenticated' : 'User is not authenticated';
});

// ================== AUTH ROUTES ==================
Route::middleware(['auth'])->group(function () {

    // ===== Dashboard Routes =====
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // New route for pending companies
    Route::get('/admin/companies/pending', [AdminDashboardController::class, 'pendingCompanies'])->name('admin.companies.pending');

    // New route for managing users
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create', [AdminDashboardController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminDashboardController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminDashboardController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminDashboardController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminDashboardController::class, 'deleteUser'])->name('admin.users.delete');
    
    // Job Posts Management for Admin
    Route::resource('job-posts', AdminJobPostController::class)->names([
        'index'   => 'admin.job-posts.index',
        'create'  => 'admin.job-posts.create',
        'store'   => 'admin.job-posts.store',
        'edit'    => 'admin.job-posts.edit',
        'update'  => 'admin.job-posts.update',
        'destroy' => 'admin.job-posts.destroy',
    ]);
    
    // ===== Berita Routes =====
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/', [BeritaController::class, 'store'])->name('store');
        Route::get('/{berita:slug}', [BeritaController::class, 'show'])->name('show');
        Route::delete('/{berita:slug}', [BeritaController::class, 'destroy'])->name('destroy');
    });
    
    // ===== Jurusan Routes =====
    Route::prefix('jurusan')->name('jurusan.')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('index');
        Route::get('/{jurusan:slug}', [JurusanController::class, 'show'])->name('show');
    });
    
    // ===== Job Routes =====
    Route::prefix('jobs')->name('jobs.')->group(function () {
        Route::get('/', [JobPostController::class, 'index'])->name('index');
        Route::get('/{job}', [JobPostController::class, 'show'])->name('show');
    });
    
    // ===== Application Routes =====
    Route::prefix('applications')->name('applications.')->group(function () {
        Route::post('/', [ApplicationController::class, 'store'])->name('store');
        Route::get('/{application}', [ApplicationController::class, 'show'])->name('show');
    });
    
    // ===== Company Routes =====
    Route::prefix('company')->middleware('role:company')->name('company.')->group(function () {
        Route::get('/jobs', [JobPostController::class, 'companyIndex'])->name('jobs.index');
        Route::get('/jobs/create', [JobPostController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobPostController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [JobPostController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{job}', [JobPostController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [JobPostController::class, 'destroy'])->name('jobs.destroy');

        Route::get('/applications', [ApplicationController::class, 'indexForCompany'])->name('applications.index');
        Route::get('/applications/{application}/preview', [ApplicationController::class, 'previewPdf'])->name('applications.preview');
        Route::get('/applications/{application}/download', [ApplicationController::class, 'downloadPdf'])->name('applications.download');
        Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
    });
    
    // ===== Profile Routes =====
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('index');
        Route::get('/show', [ProfileController::class, 'show'])->name('show');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
        Route::get('/upload-cv', [ProfileController::class, 'showUploadForm'])->name('upload-cv');
        Route::post('/upload-cv', [ProfileController::class, 'uploadCv'])->name('upload-cv.post');
    });

    // ===== Lamaran Routes =====
    Route::prefix('lamarans')->name('lamarans.')->group(function () {
        Route::get('/', [LamaranController::class, 'index'])->name('index');
        Route::get('/create', [LamaranController::class, 'create'])->name('create');
        Route::post('/', [LamaranController::class, 'store'])->name('store');
        Route::get('/{lamaran}', [LamaranController::class, 'show'])->name('show');
        Route::get('/{lamaran}/edit', [LamaranController::class, 'edit'])->name('edit');
        Route::put('/{lamaran}', [LamaranController::class, 'update'])->name('update');
        Route::delete('/{lamaran}', [LamaranController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/status', [LamaranController::class, 'updateStatus'])->name('updateStatus');
    });

    // ===== Lowongan Routes =====
    Route::prefix('lowongans')->name('lowongans.')->group(function () {
        Route::get('/', [LowonganController::class, 'index'])->name('index');
        Route::get('/create', [LowonganController::class, 'create'])->name('create');
        Route::post('/', [LowonganController::class, 'store'])->name('store');
        Route::get('/{lowongan}', [LowonganController::class, 'show'])->name('show');
        Route::get('/{lowongan}/edit', [LowonganController::class, 'edit'])->name('edit');
        Route::put('/{lowongan}', [LowonganController::class, 'update'])->name('update');
        Route::delete('/{lowongan}', [LowonganController::class, 'destroy'])->name('destroy');
    });
});