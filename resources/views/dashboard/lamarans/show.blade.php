@extends('layouts.app')

@section('title', 'Detail Lamaran')

@section('content')
<h2>Detail Lamaran #{{ $lamaran->id }}</h2>

<table cellpadding="6">
    <tr><th>Pelamar</th><td>{{ $lamaran->user->name ?? '-' }}</td></tr>
    <tr><th>Lowongan</th><td>{{ $lamaran->lowongan->judul ?? '-' }}</td></tr>
    <tr><th>CV</th>
        <td>
            @if($lamaran->cv)
                <a href="{{ asset('storage/'.$lamaran->cv) }}" target="_blank">Lihat CV</a>
            @else
                Belum upload
            @endif
        </td>
    </tr>
    <tr><th>Status</th><td>{{ $lamaran->status }}</td></tr>
    <tr><th>Dibuat</th><td>{{ $lamaran->created_at }}</td></tr>
</table>

<p style="margin-top:10px;">|
    <a href="{{ route('lamarans.index') }}">Kembali</a>
</p>
@endsection
