@extends('layouts.app')

@section('title', 'Informasi')

@section('content')
<div style="margin-left: 250px; padding: 20px;">
    <h1>Informasi</h1>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Tentang BKK OPAT</h3>
            <p>BKK OPAT (Bursa Kerja Khusus - Otomatisasi dan Tata Kelola Perkantoran) adalah platform yang menghubungkan lulusan dengan perusahaan-perusahaan yang membutuhkan tenaga kerja berkualitas.</p>
        </div>
        
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Panduan Penggunaan</h3>
            <ul>
                <li><strong>Perusahaan:</strong> Bisa memposting lowongan kerja dan melihat lamaran yang masuk</li>
                <li><strong>Pelamar:</strong> Bisa melihat lowongan dan mengirimkan lamaran</li>
                <li><strong>Admin:</strong> Mengelola seluruh sistem dan pengguna</li>
            </ul>
        </div>
        
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>Kontak Kami</h3>
            <p><i class="fas fa-envelope"></i> Email: bkk@opat.sch.id</p>
            <p><i class="fas fa-phone"></i> Telepon: (021) 12345678</p>
            <p><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Pendidikan No. 123, Jakarta</p>
        </div>
        
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3>FAQ (Frequently Asked Questions)</h3>
            <details style="margin-bottom: 10px;">
                <summary style="cursor: pointer; font-weight: bold;">Bagaimana cara mendaftar sebagai perusahaan?</summary>
                <p style="margin-top: 10px;">Klik menu "Register" dan pilih role sebagai perusahaan, lalu isi formulir pendaftaran.</p>
            </details>
            
            <details style="margin-bottom: 10px;">
                <summary style="cursor: pointer; font-weight: bold;">Apakah ada biaya untuk melamar pekerjaan?</summary>
                <p style="margin-top: 10px;">Tidak, semua fitur di BKK OPAT gratis untuk digunakan oleh pelamar.</p>
            </details>
            
            <details>
                <summary style="cursor: pointer; font-weight: bold;">Bagaimana cara upload CV?</summary>
                <p style="margin-top: 10px;">Login ke akun Anda, lalu klik menu "Profil Saya" dan pilih "Upload CV".</p>
            </details>
        </div>
    </div>
</div>
@endsection
