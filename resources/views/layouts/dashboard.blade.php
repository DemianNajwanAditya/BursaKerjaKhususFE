@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard</h2>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Sidebar</h5>
                </div>
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <i class="fas fa-users"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.job-posts.index') }}" class="nav-link">
                                <i class="fas fa-briefcase"></i> Lowongan Kerja
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.companies.pending') }}" class="nav-link">
                                <i class="fas fa-building"></i> Perusahaan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
</div>
</div>
@endsection
