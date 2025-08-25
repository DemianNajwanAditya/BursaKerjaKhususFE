@extends('layouts.app')

@section('content')
    <h2>Daftar Lamaran</h2>

    <p><a href="{{ route('lamarans.create') }}">+ Tambah Lamaran</a></p>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding:10px; margin-bottom:15px; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
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
            @forelse($lamarans as $lamaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lamaran->nama_pelamar }}</td>
                    <td>{{ $lamaran->lowongan }}</td>
                    <td>
                        @if($lamaran->cv)
                            <a href="{{ asset('storage/'.$lamaran->cv) }}" target="_blank">Lihat CV</a>
                        @else
                            Belum upload
                        @endif
                    </td>
                    <td>{{ $lamaran->status }}</td>
                    <td style="white-space:nowrap;">
                        <a href="{{ route('lamarans.show', $lamaran->id) }}">Detail</a> |

                        <form action="{{ route('lamarans.updateStatus', $lamaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="diterima">
                            <button type="submit" style="color:green;">Terima</button>
                        </form>

                        <form action="{{ route('lamarans.updateStatus', $lamaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" style="color:red;">Tolak</button>
                        </form>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('lamarans.destroy', $lamaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus data ini?')" style="color:darkred;">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align:center;">Belum ada lamaran</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
