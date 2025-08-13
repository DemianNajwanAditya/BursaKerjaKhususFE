<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #222;
        }

        /* Judul */
        h2 {
            margin-bottom: 20px;
            color: #007bff;
            font-size: 24px;
        }

        /* Form Container */
        form {
            background: white;
            padding: 25px;
            border-radius: 8px;
            width: 320px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* Label */
        label {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            display: block;
            margin-bottom: 6px;
        }

        /* Input */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0,123,255,0.2);
        }

        /* Checkbox */
        input[type="checkbox"] {
            margin-right: 6px;
        }

        /* Tombol */
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Link bawah form */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Pesan error & sukses */
        .alert-error {
            background-color: #ffe5e5;
            padding: 8px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 15px;
            color: #b30000;
        }

        .alert-success {
            background-color: #e5ffe5;
            padding: 8px;
            border-radius: 6px;
            font-size: 13px;
            margin-top: 10px;
            color: #006600;
        }
    </style>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit">Login</button>
    </form>

    <div style="margin-top: 20px; text-align: center;">
        <p style="font-size: 14px; color: #666;">
            Belum punya akun? 
            <a href="{{ route('register') }}">
                Daftar sebagai Student
            </a>
        </p>
    </div>
    
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
