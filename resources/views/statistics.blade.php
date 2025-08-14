@extends('layouts.app')

@section('title', 'Statistik Pelamar')

@section('content')
<div style="margin-left: 250px; padding: 20px;">
    <h1>Statistik Pelamar</h1>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Total Pelamar</h3>
            <p style="font-size: 2em; color: #0a63b3;">{{ $totalApplicants ?? 0 }}</p>
        </div>
        
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Pelamar Diterima</h3>
            <p style="font-size: 2em; color: #28a745;">{{ $acceptedApplicants ?? 0 }}</p>
        </div>
        
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Pelamar Diproses</h3>
            <p style="font-size: 2em; color: #ffc107;">{{ $pendingApplicants ?? 0 }}</p>
        </div>
        
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Pelamar Ditolak</h3>
            <p style="font-size: 2em; color: #dc3545;">{{ $rejectedApplicants ?? 0 }}</p>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <h3>Grafik Statistik</h3>
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <p style="text-align: center; color: #666;">Grafik statistik pelamar akan ditampilkan di sini</p>
        </div>
    </div>
</div>
@endsection
