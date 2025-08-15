@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Lowongan Kerja</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.job-posts.update', $jobPost->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Judul Pekerjaan *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $jobPost->title }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_id">Perusahaan *</label>
                            <select class="form-control" id="company_id" name="company_id" required>
                                <option value="">Pilih Perusahaan</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ $jobPost->company_id == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Lokasi *</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $jobPost->location }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Tipe Pekerjaan *</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Full-time" {{ $jobPost->type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ $jobPost->type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Contract" {{ $jobPost->type == 'Contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Pekerjaan *</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $jobPost->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="requirements">Persyaratan *</label>
                    <textarea class="form-control" id="requirements" name="requirements" rows="4" required>{{ $jobPost->requirements }}</textarea>
                </div>

                <div class="form-group">
                    <label for="salary">Gaji (Opsional)</label>
                    <input type="text" class="form-control" id="salary" name="salary" value="{{ $jobPost->salary }}">
                </div>

                <div class="form-group">
                    <label for="status">Status *</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active" {{ $jobPost->status == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ $jobPost->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Lowongan
                    </button>
                    <a href="{{ route('admin.job-posts.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
