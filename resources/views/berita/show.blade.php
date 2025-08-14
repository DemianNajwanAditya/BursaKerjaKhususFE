@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
            <li class="breadcrumb-item active">{{ $berita->judul }}</li>
        </ol>
    </nav>

    <article>
        <h1>{{ $berita->judul }}</h1>
        
        <div class="text-muted mb-3">
            <small>
                Dipublikasikan pada {{ $berita->getFormattedDate() }} oleh {{ $berita->user->name }}
            </small>
        </div>

        @if($berita->foto)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" 
                 class="img-fluid rounded">
        </div>
        @endif

        <div class="content">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </article>

    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
