@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Lowongan Kerja</h2>
    <a href="{{ route('lowongans.create') }}" class="btn btn-primary mb-3">+ Tambah Lowongan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Perusahaan</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lowongans as $lowongan)
            <tr>
                <td>{{ $lowongan->id }}</td>
                <td>{{ $lowongan->judul }}</td>
                <td>{{ $lowongan->perusahaan }}</td>
                <td>{{ Str::limit($lowongan->deskripsi, 50) }}</td>
                <td>{{ $lowongan->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
