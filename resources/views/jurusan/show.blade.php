@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $jurusan->nama }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $jurusan->nama }}</h1>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Deskripsi Program Studi</h5>
                    <p class="card-text">{{ $jurusan->deskripsi }}</p>
                    
                    <h6 class="mt-4">Kompetensi yang Dipelajari:</h6>
                    <ul>
                        <li>Teori dasar {{ $jurusan->nama }}</li>
                        <li>Praktik lapangan</li>
                        <li>Proyek industri</li>
                        <li>Sertifikasi kompetensi</li>
                    </ul>
                    
                    <h6 class="mt-4">Prospek Karir:</h6>
                    <ul>
                        <li>Junior {{ $jurusan->nama }}</li>
                        <li>Senior {{ $jurusan->nama }}</li>
                        <li>Project Manager</li>
                        <li>Konsultan</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="jurusan-icon mb-3" style="font-size: 4rem;">
                        {{ substr($jurusan->nama, 0, 3) }}
                    </div>
                    <h5>{{ $jurusan->nama }}</h5>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-body">
                    <h6>Informasi Kontak</h6>
                    <p><strong>Email:</strong> {{ strtolower(str_replace(' ', '', $jurusan->nama)) }}@smkn1contoh.sch.id</p>
                    <p><strong>Telepon:</strong> (021) 12345678</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
