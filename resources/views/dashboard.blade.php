@extends('layouts.app')

@section('content')
<style>
/* Reset dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background-color: #f3f4f6;
    color: #333;
}

/* Navbar */
nav {
    background-color: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    padding: 1rem;
}

nav > div {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav h1 {
    font-size: 1.25rem;
    font-weight: bold;
    color: #2563eb;
}

nav span {
    color: #4b5563;
}

nav form button {
    background-color: #ef4444;
    color: white;
    border: none;
    padding: 0.4rem 0.8rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s;
}

nav form button:hover {
    background-color: #dc2626;
}

/* Container utama */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 2rem 1rem;
}

.container h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

/* Filter Waktu */
.filter-box {
    background-color: white;
    border-radius: 8px;
    padding: 1rem;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    margin-bottom: 1.5rem;
}

.filter-box h3 {
    font-size: 1rem;
}

.filter-links {
    display: flex;
    gap: 0.5rem;
}

.filter-links a {
    background-color: #e5e7eb;
    color: #374151;
    padding: 0.3rem 0.6rem;
    border-radius: 4px;
    font-size: 0.9rem;
    text-decoration: none;
    transition: background 0.2s;
}

.filter-links a:hover {
    background-color: #d1d5db;
}

/* Statistik Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.card {
    background-color: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    display: flex;
    align-items: center;
}

.card svg {
    width: 24px;
    height: 24px;
    margin-right: 1rem;
}

.card p:first-child {
    font-size: 0.9rem;
    color: #6b7280;
}

.card p:last-child {
    font-size: 1.4rem;
    font-weight: bold;
    color: #111827;
}

/* Role box */
.role-box {
    background-color: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    margin-bottom: 1rem;
}

.role-box a {
    display: inline-block;
    margin-top: 0.8rem;
    background-color: #2563eb;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    transition: background 0.2s;
}

.role-box a:hover {
    background-color: #1d4ed8;
}

/* Warna untuk status pelamar */
.status-accepted {
    color: #16a34a;
    font-weight: bold;
}

.status-rejected {
    color: #dc2626;
    font-weight: bold;
}

.status-pending {
    color: #ca8a04;
    font-weight: bold;
}
</style>

<div>
    <!-- Navbar -->
    <nav>
        <div>
            <h1>Bursa Kerja Khusus</h1>
            <div>
                <span>Halo, {{ $user->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container">
        <h2>Selamat datang di Dashboard</h2>
        
        <!-- Time Filter -->
        <div class="filter-box">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3>Filter Waktu</h3>
                <div class="filter-links">
                    <a href="?filter=today">Hari Ini</a>
                    <a href="?filter=this_week">Minggu Ini</a>
                    <a href="?filter=this_month">Bulan Ini</a>
                    <a href="?filter=all_time">Semua Waktu</a>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <!-- Lowongan Aktif -->
            <div class="card">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 
                          0-6.22-.62-9-1.745M16 6V4a2 2 0 
                          00-2-2h-4a2 2 0 00-2 2v2m4 
                          6h.01M5 20h14a2 2 0 002-2V8a2 
                          2 0 00-2-2H5a2 2 0 00-2 
                          2v10a2 2 0 002 2z"></path>
                </svg>
                <div>
                    <p>Lowongan Aktif</p>
                    <p>{{ $statistics['active_jobs'] }}</p>
                </div>
            </div>

            <!-- Lowongan Ditutup -->
            <div class="card">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 15v2m-6 4h12a2 2 0 
                          002-2v-6a2 2 0 00-2-2H6a2 2 
                          0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 
                          0 00-8 0v4h8z"></path>
                </svg>
                <div>
                    <p>Lowongan Ditutup</p>
                    <p>{{ $statistics['closed_jobs'] }}</p>
                </div>
            </div>

            <!-- Total Pelamar -->
            <div class="card">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 20h5v-2a3 3 0 
                          00-5.356-1.857M17 20H7m10 
                          0v-2c0-.656-.126-1.283-.356-1.857M7 
                          20H2v-2a3 3 0 015.356-1.857M7 
                          20v-2c0-.656.126-1.283.356-1.857m0 
                          0a5.002 5.002 0 019.288 0M15 
                          7a3 3 0 11-6 0 3 3 0 016 0zm6 
                          3a2 2 0 11-4 0 2 2 0 014 0zM7 
                          10a2 2 0 11-4 0 2 2 0 014 
                          0z"></path>
                </svg>
                <div>
                    <p>Total Pelamar</p>
                    <p>{{ $statistics['total_applicants'] }}</p>
                </div>
            </div>

            <!-- Status Pelamar -->
            <div class="card">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 12l2 2 4-4m6 2a9 9 
                          0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p>Status Pelamar</p>
                    <p>
                        <span class="status-accepted">{{ $statistics['accepted_applicants'] }} Diterima</span> | 
                        <span class="status-rejected">{{ $statistics['rejected_applicants'] }} Ditolak</span> | 
                        <span class="status-pending">{{ $statistics['pending_applicants'] }} Pending</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Role-specific content -->
        @if($user->role == 'admin')
            <div class="role-box">
                <p>Anda login sebagai <b>Admin BKK</b></p>
                <a href="#">Kelola Perusahaan & Lowongan</a>
            </div>

        @elseif($user->role == 'company')
            <div class="role-box">
                <p>Anda login sebagai <b>Perusahaan</b></p>
                <a href="{{ route('company.jobs.create') }}">Tambah Lowongan Baru</a>
                <a href="{{ route('company.applications.index') }}">Lihat Lamaran Masuk</a>
            </div>

        @else
            <div class="role-box">
                <p>Anda login sebagai <b>Pelamar</b></p>
                <a href="{{ route('jobs.index') }}">Cari Lowongan Kerja</a>
            </div>
        @endif
    </div>
</div>
@endsection
