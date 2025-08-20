@extends('layouts.app')

@section('title', 'Tambah Lowongan Kerja')

@section('content')
    <h2>Tambah Lowongan Kerja Baru</h2>
    <a href="{{ route('admin.jobs.index') }}">← Kembali</a>

    <form action="{{ route('admin.jobs.store') }}" method="POST" style="margin-top:20px;">
        @csrf
        <label>Judul Pekerjaan *</label><br>
        <input type="text" name="title" required><br><br>

        <label>Perusahaan *</label><br>
        <select name="company" required>
            <option value="">Pilih Perusahaan</option>
            <option value="PT Maju Jaya">PT Maju Jaya</option>
            <option value="PT Sukses Selalu">PT Sukses Selalu</option>
        </select><br><br>

        <label>Lokasi *</label><br>
        <input type="text" name="location" required><br><br>

        <label>Tipe Pekerjaan *</label><br>
        <select name="type" required>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Magang">Magang</option>
        </select><br><br>

        <label>Deskripsi Pekerjaan *</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>Persyaratan *</label><br>
        <textarea name="requirements" required></textarea><br><br>

        <label>Gaji (Opsional)</label><br>
        <input type="text" name="salary" placeholder="Contoh: Rp 5.000.000 - Rp 8.000.000"><br><br>

        <label>Status *</label><br>
        <select name="status" required>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select><br><br>

        <button type="submit">Simpan Lowongan</button>
        <a href="{{ route('admin.jobs.index') }}">Batal</a>
    </form>
@endsection
