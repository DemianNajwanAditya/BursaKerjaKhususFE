@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
        <h1>Selamat Datang di Dashboard BKK</h1>
        <p>Berita Terkini dan Informasi Jurusan</p>
    </div>

    <!-- Admin Actions (only for admin) -->
    @if(auth()->user()->role === 'admin')
    <div class="admin-actions">
        <h3>Kelola Konten</h3>
        <a href="{{ route('berita.create') }}" class="btn-success">Tambah Berita Baru</a>
    </div>
    @endif

    <!-- Berita Terkini Section -->
    <div>
        <h2 class="section-title">Berita Terkini</h2>
        <div class="berita-grid">
            @forelse($beritas as $berita)
            <div class="berita-card">
                @if($berita->foto)
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="berita-image">
                @else
                <div class="berita-image" style="background: #f3f4f6; display: flex; align-items: center; justify-content: center;">
                    <span style="color: #9ca3af;">No Image</span>
                </div>
                @endif
                
                <div class="berita-content">
                    <h3 class="berita-title">{{ $berita->judul }}</h3>
                    <p class="berita-excerpt">{{ $berita->getExcerpt() }}</p>
                    
                    <div class="berita-meta">
                        <span>{{ $berita->getFormattedDate() }}</span>
                        <a href="{{ route('berita.show', $berita->slug) }}" class="btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; color: #6b7280;">
                <p>Belum ada berita yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Program Studi/Jurusan Section -->
    <div>
        <h2 class="section-title">Program Studi & Jurusan</h2>
        <div class="jurusan-grid">
            @foreach($jurusans as $jurusan)
            <a href="{{ route('jurusan.show', $jurusan->slug) }}" class="jurusan-card">
                <div class="jurusan-icon">
                    {{ substr($jurusan->nama, 0, 3) }}
                </div>
                <h3 class="jurusan-name">{{ $jurusan->nama }}</h3>
                <p class="jurusan-description">{{ Str::limit($jurusan->deskripsi, 100) }}</p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
