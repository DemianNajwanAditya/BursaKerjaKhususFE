@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">Bursa Kerja Khusus</h1>
            <div class="flex items-center gap-4">
                <span class="text-gray-700">Halo, {{ $user->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold mb-4">Selamat datang di Dashboard</h2>
        
        @if($user->role == 'admin')
            <div class="bg-white shadow p-6 rounded-lg">
                <p class="text-gray-700">Anda login sebagai <b>Admin BKK</b></p>
                <a href="#" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Kelola Perusahaan & Lowongan
                </a>
            </div>
        @elseif($user->role == 'company')
            <div class="bg-white shadow p-6 rounded-lg">
                <p class="text-gray-700">Anda login sebagai <b>Perusahaan</b></p>
                <a href="#" class="mt-4 inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    Tambah Lowongan Baru
                </a>
            </div>
        @else
            <div class="bg-white shadow p-6 rounded-lg">
                <p class="text-gray-700">Anda login sebagai <b>Pelamar</b></p>
                <a href="#" class="mt-4 inline-block bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded">
                    Cari Lowongan Kerja
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
