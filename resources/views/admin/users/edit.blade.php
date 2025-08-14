@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Edit User</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="company" {{ old('role', $user->role) == 'company' ? 'selected' : '' }}>Company</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update User
                            </button>
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Users
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Created:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>
                    <p><strong>Last Updated:</strong> {{ $user->updated_at->format('d M Y H:i') }}</p>
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    
                    @if($user->role == 'company' && $user->company)
                        <hr>
                        <h6>Company Details</h6>
                        <p><strong>Company Name:</strong> {{ $user->company->name ?? 'N/A' }}</p>
                        <p><strong>Company Status:</strong> 
                            <span class="badge bg-{{ $user->company->is_verified ? 'success' : 'warning' }}">
                                {{ $user->company->is_verified ? 'Verified' : 'Pending' }}
                            </span>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
