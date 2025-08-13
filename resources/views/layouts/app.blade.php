<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Aplikasi Laravel' }}</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #222;
            line-height: 1.6;
        }

        /* Header minimalis */
        header {
            background: white;
            padding: 15px 20px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        header h1 {
            font-size: 22px;
            margin-bottom: 8px;
            color: #007bff;
        }

        header nav a {
            color: #444;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 500;
        }

        header nav a:hover {
            color: #007bff;
        }

        /* Konten utama */
        main {
            max-width: 900px;
            margin: 25px auto;
            background: white;
            padding: 20px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
        }

        /* Footer minimalis */
        footer {
            background: white;
            border-top: 1px solid #e0e0e0;
            color: #555;
            text-align: center;
            padding: 12px;
            font-size: 14px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <header>
        <h1>Selamat Datang di BKK SMKN 4 Bandung</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </nav>
    </header>

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} - Semua Hak Dilindungi</p>
    </footer>

</body>
</html>
