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
use Illuminate\Container\Attributes\Auth;

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

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
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
        'index' => 'admin.job-posts.index',
        'create' => 'admin.job-posts.create',
        'store' => 'admin.job-posts.store',
        'edit' => 'admin.job-posts.edit',
        'update' => 'admin.job-posts.update',
        'destroy' => 'admin.job-posts.destroy',
    ]);
    
    // Berita Routes
    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('/', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
        Route::delete('/{berita:slug}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });
    
    // Jurusan Routes
    Route::prefix('jurusan')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('jurusan.index');
        Route::get('/{jurusan:slug}', [JurusanController::class, 'show'])->name('jurusan.show');
    });
    
    // Job Routes
    Route::prefix('jobs')->group(function () {
        Route::get('/', [JobPostController::class, 'index'])->name('jobs.index');
        Route::get('/{job}', [JobPostController::class, 'show'])->name('jobs.show');
    });
    
    // Application Routes
    Route::prefix('applications')->group(function () {
        Route::post('/', [ApplicationController::class, 'store'])->name('applications.store');
        Route::get('/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    });
    
    // Company Routes
    Route::prefix('company')->middleware('role:company')->group(function () {
        Route::get('/jobs', [JobPostController::class, 'companyIndex'])->name('company.jobs.index');
        Route::get('/jobs/create', [JobPostController::class, 'create'])->name('company.jobs.create');
        Route::post('/jobs', [JobPostController::class, 'store'])->name('company.jobs.store');
        Route::get('/jobs/{job}/edit', [JobPostController::class, 'edit'])->name('company.jobs.edit');
        Route::put('/jobs/{job}', [JobPostController::class, 'update'])->name('company.jobs.update');
        Route::delete('/jobs/{job}', [JobPostController::class, 'destroy'])->name('company.jobs.destroy');
        Route::get('/applications', [ApplicationController::class, 'indexForCompany'])->name('company.applications.index');
        Route::get('/applications/{application}/preview', [ApplicationController::class, 'previewPdf'])->name('company.applications.preview');
        Route::get('/applications/{application}/download', [ApplicationController::class, 'downloadPdf'])->name('company.applications.download');
        Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('company.applications.updateStatus');
    });
    
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile');
        Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/upload-cv', [ProfileController::class, 'showUploadForm'])->name('profile.upload-cv');
        Route::post('/upload-cv', [ProfileController::class, 'uploadCv'])->name('profile.upload-cv.post');
    });
Route::middleware(['auth'])->group(function () {
        Route::resource('lowongans', LowonganController::class);
        Route::resource('lamarans', LamaranController::class)->except(['edit', 'update', 'destroy']);
        Route::resource('lamarans', LamaranController::class);
        Route::get('/lamarans/{lamaran}/edit', [LamaranController::class, 'edit'])->name('lamarans.edit');
        Route::put('/lamarans/{lamaran}', [LamaranController::class, 'update'])->name('lamarans.update');
        Route::get('/dashboard/lamarans', [LamaranController::class, 'index'])->name('lamarans.index');
        Route::post('/dashboard/lamarans/{id}/status', [LamaranController::class, 'updateStatus'])->name('lamarans.updateStatus');
    });
});
