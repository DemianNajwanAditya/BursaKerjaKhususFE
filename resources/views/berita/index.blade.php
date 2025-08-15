@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Berita Terkini</h1>
    <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    
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
                    <div class="d-flex gap-2">
                        <a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        @if(auth()->check() && (auth()->id() == $berita->user_id || auth()->user()->role == 'admin'))
                            <form action="{{ route('berita.destroy', $berita->slug) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $beritas->links() }}
</div>
@endsection
