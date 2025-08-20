@extends('layouts.app')

@section('title', 'Kelola Pelamar')

@section('content')
    <h2>Daftar Pelamar</h2>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelamar</th>
                <th>Lowongan</th>
                <th>CV</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lamarans as $lamaran)
                <tr>
                    <td>{{ $lamaran->id }}</td>
                    {{-- perbaikan disini --}}
                    <td>{{ $lamaran->nama_pelamar }}</td> 
                    {{-- pastikan di tabel lowongans kolomnya memang "judul" --}}
                    <td>{{ $lamaran->lowongan->judul ?? '-' }}</td>
                    <td>
                        @if($lamaran->cv)
                            <a href="{{ asset('storage/'.$lamaran->cv) }}" target="_blank">Lihat CV</a>
                        @else
                            Belum upload
                        @endif
                    </td>
                    <td>{{ $lamaran->status ?? 'Pending' }}</td>
                    <td>
                        <a href="{{ route('lamarans.show', $lamaran->id) }}">Detail</a> | 
                        <a href="{{ route('lamarans.edit', $lamaran->id) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Belum ada lamaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
