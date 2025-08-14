@extends('layouts.app')

@section('title', 'Prestasi')

@section('content')
<div style="margin-left: 250px; padding: 20px;">
    <h1>Prestasi</h1>
    
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 20px;">
        <h3>Daftar Prestasi</h3>
        
        <div style="margin-top: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">No</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Nama Prestasi</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Tingkat</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Tahun</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">1</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Juara 1 Lomba Programming</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Nasional</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">2024</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Lomba yang diselenggarakan oleh BEM IT</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">2</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Best Project Award</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Kampus</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">2023</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Proyek akhir dengan nilai terbaik</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">3</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Sertifikasi Kompetensi</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Internasional</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">2024</td>
                        <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">Google Certified Professional</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
