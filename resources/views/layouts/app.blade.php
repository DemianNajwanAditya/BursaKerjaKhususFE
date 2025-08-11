<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Aplikasi Laravel' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- Header --}}
    <header>
        <h1>Selamat Datang di BKK SMKN 4 Bandung</h1>
        <nav>
            <a href="/">Home</a> |
            <a href="/login">Login</a> |
            <a href="/register">Register</a>
        </nav>
    </header>

    <hr>

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    <hr>

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} - Semua Hak Dilindungi</p>
    </footer>

</body>
</html>
