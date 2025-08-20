@extends('layouts.app')

@section('title', 'Detail Lamaran')

@section('content')
    <h2>Detail Lamaran</h2>

    <p><strong>Nama Pelamar:</strong> {{ $lamaran->name_pelamar }}</p>
    <p><strong>Lowongan:</strong> {{ $lamaran->lowongan->judul ?? '-' }}</p>
    <p><strong>CV:</strong>
        @if($lamaran->cv)
            <a href="{{ asset('storage/'.$lamaran->cv) }}" target="_blank">Lihat CV</a>
        @else
            Belum upload
        @endif
    </p>
    <p><strong>Status:</strong> {{ $lamaran->status }}</p>

    <form action="{{ route('lamarans.update', $lamaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="status">Ubah Status:</label>
        <select name="status" id="status">
            <option value="Menunggu" {{ $lamaran->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="Diterima" {{ $lamaran->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="Ditolak" {{ $lamaran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('lamarans.index') }}">← Kembali</a>
@endsection
