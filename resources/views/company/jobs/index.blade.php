@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Kelola Lowongan Pekerjaan</h4>
                    <a href="{{ route('company.jobs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Lowongan
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($jobs->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada lowongan pekerjaan</h5>
                            <p class="text-muted">Tambahkan lowongan pekerjaan pertama Anda</p>
                            <a href="{{ route('company.jobs.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Lowongan
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Judul Pekerjaan</th>
                                        <th>Lokasi</th>
                                        <th>Tipe</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Pelamar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>
                                                <strong>{{ $job->title }}</strong>
                                                <br>
                                                <small class="text-muted">{{ Str::limit($job->description, 50) }}</small>
                                            </td>
                                            <td>{{ $job->location ?? '-' }}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ ucfirst($job->type ?? 'Full-time') }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($job->deadline)
                                                    {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $job->status === 'active' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($job->status ?? 'Active') }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-light">
                                                    {{ $job->applications->count() }} Pelamar
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-info" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('company.jobs.edit', $job) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('company.jobs.destroy', $job) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination removed since we're using get() instead of paginate() --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
    }
    .btn-group .btn {
        margin-right: 2px;
    }
</style>
@endpush
