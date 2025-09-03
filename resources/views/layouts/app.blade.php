<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - BKK OPAT</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Sidebar Style */
       .sidebar {
        position: fixed;
        top: 0;
        left: -260px; /* tersembunyi default */
        width: 250px;
        height: 100%;
        background: #043263;
        transition: 0.3s;
        z-index: 1000;
    }

        .sidebar.active {
            left: 0; /* kalau aktif muncul */
        }

        .sidebar .logo {
            display: block;
            width: 80px;
            margin: 0 auto 10px;
        }

        .sidebar .app-name {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar .profile-pic {
            width: 80px;
            height: 80px;
            background: gray;
            border-radius: 50%;
            margin: 0 auto 20px;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
        }

        .nav-menu li {
            margin: 5px 0;
        }

        .nav-menu a, 
        .nav-menu button {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            transition: background 0.2s;
            width: 100%;
        }

        .nav-menu a:hover, 
        .nav-menu button:hover {
            background: #06529d;
            border-radius: 5px;
        }

        /* Overlay (latar hitam transparan) */
       .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 900;
    }

        .overlay.active {
        display: block;
    }

        /* Header dengan tombol menu */
        header {
            background: #043263;
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1100;
        }

        .menu-btn {
            font-size: 20px;
            cursor: pointer;
            background: none;
            border: none;
            color: white;
        }

        /* Main Content */
        .main-content {
        margin-left: 0; /* konten tetap full */
        transition: 0.3s;
        }

        @media(min-width: 1024px) {
            .overlay {
                display: none !important;
            }
            .main-content {
                margin-left: 0px;
            }
        }

        
    </style>
</head>
<body>
    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
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
                <li><a href="{{ route('lamarans.index') }}"><i class="fas fa-users"></i> Kelola Pelamar</a></li>
            @endif
            @if(auth()->check() && auth()->user()->role === 'student')
                <li><a href="{{ route('profile.upload-cv') }}"><i class="fa-solid fa-upload"></i> Upload CV</a></li>
                <li><a href="{{ route('lamarans.create') }}"><i class="fa-solid fa-paper-plane"></i> Ajukan Lamaran</a></li>
            @endif
            <li><a href="{{ route('statistics') }}"><i class="fa-solid fa-chart-line"></i> Statistik</a></li>
            <li><a href="{{ route('achievements') }}"><i class="fa-solid fa-trophy"></i> Prestasi</a></li>
            <li><a href="{{ route('info') }}"><i class="fa-solid fa-info-circle"></i> Informasi</a></li>
            <li><a href="{{ route('profile.index') }}"><i class="fa-solid fa-user"></i> Profil Saya</a></li>
            <li>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <header>
        <button class="menu-btn" onclick="toggleSidebar()">☰</button>
        <h1>BKK OPAT</h1>
        <div class="notif">🔔</div>
    </header>

    <!-- Konten Utama -->
    <div class="main-content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");
            sidebar.classList.toggle("active");

            if (sidebar.classList.contains("active")) {
                overlay.style.display = "block";
            } else {
                overlay.style.display = "none";
            }
        }
    </script>
</body>
</html>
