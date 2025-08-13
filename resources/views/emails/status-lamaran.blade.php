<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Lamaran - Bursa Kerja Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .header {
            text-align: center;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        .header h1 {
            color: #111827;
            font-size: 20px;
            margin: 0;
        }
        .content {
            padding-top: 16px;
            color: #374151;
            line-height: 1.6;
        }
        .status {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 8px;
            color: #fff;
            font-weight: bold;
            margin-top: 12px;
        }
        .status.diterima { background-color: #16a34a; }
        .status.ditolak { background-color: #dc2626; }
        .status.menunggu { background-color: #f59e0b; }
        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 16px;
        }
        .footer {
            font-size: 12px;
            color: #6b7280;
            text-align: center;
            margin-top: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Bursa Kerja Sekolah</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Halo <strong>{{ $nama }}</strong>,</p>

            @if($tipe == 'apply')
                <p>Lamaran Anda untuk posisi <strong>{{ $posisi }}</strong> di <strong>{{ $perusahaan }}</strong> telah berhasil diajukan.</p>
                <span class="status menunggu">Menunggu Review</span>
            @elseif($tipe == 'diterima')
                <p>Selamat! Lamaran Anda untuk posisi <strong>{{ $posisi }}</strong> di <strong>{{ $perusahaan }}</strong> telah <strong>DITERIMA</strong>.</p>
                <span class="status diterima">Diterima</span>
            @elseif($tipe == 'ditolak')
                <p>Maaf, lamaran Anda untuk posisi <strong>{{ $posisi }}</strong> di <strong>{{ $perusahaan }}</strong> <strong>DITOLAK</strong>.</p>
                <span class="status ditolak">Ditolak</span>
            @elseif($tipe == 'verifikasi')
                <p>Perusahaan Anda <strong>{{ $perusahaan }}</strong> telah berhasil diverifikasi oleh Admin BKK.</p>
                <span class="status diterima">Terverifikasi</span>
            @endif

            <p>Silakan cek dashboard Anda untuk informasi lebih lanjut.</p>
            <a href="{{ $url }}" class="btn">Buka Dashboard</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem Bursa Kerja Sekolah. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
