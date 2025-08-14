@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Berita Terkini</h1>
    <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
    <div class="row">
        @foreach($beritas as $berita)
        <div class="col-md-4">
            <div class="card">
                @if($berita->foto)
                <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top" alt="{{ $berita->judul }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                    <p class="card-text">{{ $berita->getExcerpt() }}</p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $beritas->links() }}
</div>
@endsection
