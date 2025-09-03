<body>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

    <!-- Container animasi Lottie -->
    <div id="lottie-animation" style="width:250px; height:250px; margin:0 auto 20px;"></div>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <i class="fa fa-eye-slash" id="togglePassword"></i>
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

        <!-- ANIMASI -->
        <div class="animation-box">
            <div id="lottie-animation"></div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
    <script>
        // Toggle Password
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Lottie Animation
        lottie.loadAnimation({
            container: document.getElementById("lottie-animation"),
            renderer: "svg",
            loop: true,
            autoplay: true,
            path: "https://lottie.host/ae75b9b9-c8f8-4db5-a30c-3c0c1de2c026/jmhHHxwSkA.json"
        });
    </script>
</body>
</html>