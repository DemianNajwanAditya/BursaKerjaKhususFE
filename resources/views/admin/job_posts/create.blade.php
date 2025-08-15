@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tambah Lowongan Kerja Baru</h2>
        <a href="{{ route('admin.job-posts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.job-posts.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Judul Pekerjaan *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_id">Perusahaan *</label>
                            <select class="form-control" id="company_id" name="company_id" required>
                                <option value="">Pilih Perusahaan</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Lokasi *</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Tipe Pekerjaan *</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Pekerjaan *</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="requirements">Persyaratan *</label>
                    <textarea class="form-control" id="requirements" name="requirements" rows="4" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="salary">Gaji (Opsional)</label>
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="Contoh: Rp 5.000.000 - Rp 8.000.000">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status *</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Lowongan
                    </button>
                    <a href="{{ route('admin.job-posts.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
