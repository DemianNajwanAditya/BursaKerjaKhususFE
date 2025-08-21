@extends('layouts.app')

@section('content')

<div style="margin-bottom:15px;">
    <a href="{{ route('lamarans.create') }}" 
       style="background:#28a745; color:#fff; padding:8px 15px; border-radius:5px; text-decoration:none;">
       + Tambah Lamaran
    </a>

    <a href="{{ url()->previous() }}" 
       style="background:#6c757d; color:#fff; padding:8px 15px; border-radius:5px; text-decoration:none; margin-left:10px;">
       ⬅ Kembali
    </a>
</div>


<table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelamar</th>
            <th>Lowongan</th>
            <th>CV</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lamarans as $index => $lamaran)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $lamaran->nama_pelamar ?? '-' }}</td>
                <td>{{ $lamaran->lowongan ?? '-' }}</td>
                <td>
                    @if($lamaran->cv)
                        <a href="{{ asset('storage/'.$lamaran->cv) }}" target="_blank">Lihat CV</a>
                    @else
                        Belum upload
                    @endif
                </td>
                <td>{{ $lamaran->status ?? 'pending' }}</td>
                <td>
                    <form action="{{ route('lamarans.updateStatus', $lamaran->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="status" value="Diterima">
                        <button type="submit" style="background:#28a745; color:#fff; border:none; padding:5px 10px; border-radius:4px;">Terima</button>
                    </form>

                    <form action="{{ route('lamarans.updateStatus', $lamaran->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="status" value="Ditolak">
                        <button type="submit" style="background:#dc3545; color:#fff; border:none; padding:5px 10px; border-radius:4px;">Tolak</button>
                    </form>

                    <a href="{{ route('lamarans.show', $lamaran->id) }}" 
                       style="background:#007bff; color:#fff; padding:5px 10px; border-radius:4px; text-decoration:none;">
                       Detail
                    </a>
                    <a href="{{ route('lamarans.edit', $lamaran->id) }}" 
                        style="background:#ffc107; color:#000; padding:5px 10px; border-radius:4px; text-decoration:none;">
                        Edit
                    </a>
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
