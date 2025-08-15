<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - BKK OPAT</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div style="display: flex; min-height: 100vh;">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Logo dan Nama -->
            <img src="{{ asset('ASSETS/logo.png') }}" alt="Logo" class="logo">
            <div class="app-name">BKK OPAT</div>

            <!-- Foto Profil -->
            <div class="profile-pic"></div>

            <!-- Menu Navigasi -->
            <ul class="nav-menu">
                <li><a href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i> Halaman Utama</a></li>
                <li><a href="{{ route('jobs.index') }}"><i class="fa-solid fa-briefcase"></i> Lowongan Kerja</a></li>
                <li><a href="{{ route('berita.index') }}"><i class="fa-solid fa-newspaper"></i> Berita</a></li>
                @if(auth()->check() && auth()->user()->role === 'company')
                    <li><a href="{{ route('company.jobs.create') }}"><i class="fa-solid fa-plus"></i> Tambah Lowongan</a></li>
                    <li><a href="{{ route('company.jobs.index') }}"><i class="fa-solid fa-briefcase"></i> Kelola Lowongan</a></li>
                    <li><a href="{{ route('company.applications.index') }}"><i class="fa-solid fa-file-alt"></i> Kelola Lamaran</a></li>
                @endif
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-cog"></i> Admin Dashboard</a></li>
                    <li><a href="{{ route('admin.users') }}"><i class="fa-solid fa-users"></i> Kelola User</a></li>
                    <li><a href="{{ route('admin.job-posts.index') }}"><i class="fa-solid fa-briefcase"></i> Kelola Data Lowongan Kerja</a></li>
                @endif
                @if(auth()->check() && auth()->user()->role === 'student')
                    <li><a href="{{ route('profile.upload-cv') }}"><i class="fa-solid fa-upload"></i> Upload CV</a></li>
                @endif
                <li><a href="{{ route('statistics') }}"><i class="fa-solid fa-chart-line"></i> Statistik</a></li>
                <li><a href="{{ route('achievements') }}"><i class="fa-solid fa-trophy"></i> Prestasi</a></li>
                <li><a href="{{ route('info') }}"><i class="fa-solid fa-info-circle"></i> Informasi</a></li>
                <li><a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i> Profil Saya</a></li>
                <li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit" style="background:none;border:none;color:white;display:flex;align-items:center;gap:10px;padding:12px 20px;width:100%;text-align:left;">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Konten Utama -->
        <div style="flex: 1; padding: 20px;">
            @yield('content')
        </div>
    </div>
</body>
</html>
