@extends('layouts.app')

@section('content')
<style>
/* Dashboard Styles */
.dashboard-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.dashboard-header {
    text-align: center;
    margin-bottom: 3rem;
}

.dashboard-header h1 {
    font-size: 2.5rem;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.dashboard-header p {
    font-size: 1.125rem;
    color: #6b7280;
}

/* Section Styles */
.section-title {
    font-size: 1.875rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1.5rem;
    text-align: center;
}

/* Berita Section */
.berita-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.berita-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.berita-card:hover {
    transform: translateY(-4px);
}

.berita-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.berita-content {
    padding: 1.5rem;
}

.berita-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.berita-excerpt {
    color: #6b7280;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.berita-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: #9ca3af;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #2563eb;
}

/* Jurusan Section */
.jurusan-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.jurusan-card {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.jurusan-card:hover {
    transform: translateY(-4px);
}

.jurusan-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1rem;
    background: #f3f4f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}

.jurusan-name {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.jurusan-description {
    color: #6b7280;
    font-size: 0.875rem;
}

/* Admin Actions */
.admin-actions {
    background: #f9fafb;
    border-radius: 12px;
    padding: 2rem;
    margin-bottom: 3rem;
    text-align: center;
}

.admin-actions h3 {
    margin-bottom: 1rem;
    color: #1f2937;
}

.btn-success {
    background-color: #10b981;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-success:hover {
    background-color: #059669;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }
    
    .berita-grid,
    .jurusan-grid {
        grid-template-columns: 1fr;
    }
}
</style>

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
