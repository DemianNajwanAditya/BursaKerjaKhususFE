@extends('layouts.app')

@section('title', 'Edit Status Lamaran')

@section('content')
    <h2>Edit Status Lamaran</h2>

    <form action="{{ route('lamarans.update', $lamaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p><strong>Nama Pelamar:</strong> {{ $lamaran->name_pelamar }}</p>
        <p><strong>Lowongan:</strong> {{ $lamaran->lowongan->judul ?? '-' }}</p>

        <label for="status">Pilih Status:</label>
        <select name="status" id="status" required>
            <option value="Menunggu" {{ $lamaran->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="Diterima" {{ $lamaran->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="Ditolak" {{ $lamaran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>

        <br><br>
        <button type="submit">Simpan</button>
        <a href="{{ route('lamarans.index') }}">Kembali</a>
    </form>
@endsection
