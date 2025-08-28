@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')

@section('content')
<style>
    /* Grid untuk semua card dan tabel */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1,0rem;
        margin-bottom: 2rem;
    }

    /* Style card */
   .card {
    background-color: white;
    border-radius: 10px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

    /* Statistik card khusus */
    .card .card-body {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card .text-xs {
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    .card.stat {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card.stat .text p:first-child {
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .card.stat .text p:last-child {
        font-size: 1.5rem;
        font-weight: bold;
        color: #111827;
    }

    .card.stat i {
        font-size: 2rem;
        color: #d1d5db;
    }

    .card.border-left-primary { border-left: 6px solid #3b82f6; }
    .card.border-left-success { border-left: 6px solid #10b981; }
    .card.border-left-info { border-left: 6px solid #06b6d4; }
    .card.border-left-warning { border-left: 6px solid #f59e0b; }

    /* Alert pending companies */
    .alert {
        max-width: 600px;
        margin: 0 auto;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9rem;
        background-color: #fff7ed;
        border: 1px solid #fdba74;
        color: #b45309;
        justify-content: center;
    }
/

    /* Table responsive lebih rapi */
    .table {
        font-size: 0.9rem;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Admin Dashboard</h1>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="dashboard-grid">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div>
                    <div class="text-xs font-weight-bold text-primary mb-1">Total Pengguna</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['total_users'] }}</div>
                </div>
                <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
        </div>

        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div>
                    <div class="text-xs font-weight-bold text-success mb-1">Total Perusahaan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['total_companies'] }}</div>
                </div>
                <i class="fas fa-building fa-2x text-gray-300"></i>
            </div>
        </div>

        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div>
                    <div class="text-xs font-weight-bold text-info mb-1">Total Lowongan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['total_jobs'] }}</div>
                </div>
                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
            </div>
        </div>

        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div>
                    <div class="text-xs font-weight-bold text-warning mb-1">Total Pelamar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics['total_applications'] }}</div>
                </div>
                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Pending Companies Alert -->
    @if($statistics['pending_companies'] > 0)
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        <strong>{{ $statistics['pending_companies'] }}</strong> companies are pending verification.
        <a href="{{ route('admin.companies.pending') }}" class="alert-link">Review them now</a>
    </div>
    @endif

    <!-- Recent Data Tables -->
    <div class="dashboard-grid">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Companies</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentCompanies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>
                                    @if($company->is_verified)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
