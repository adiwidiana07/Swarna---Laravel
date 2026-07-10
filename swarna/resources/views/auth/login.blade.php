<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SWARNA - Login Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-brand">
            <img src="{{ asset('img/SWARNA-removebg-preview.png') }}" alt="Swarna Logo" 
                 style="width: 56px; height: 56px; object-fit: contain;">
            <span class="login-brand-name">SWARNA</span>
            <span class="login-brand-tagline">Admin Panel</span>
        </div>

        <div class="login-card">
            <div class="login-header">
                <h2>Masuk</h2>
                <p>Silakan masuk untuk mengakses dashboard</p>
            </div>

            @if($errors->any())
                <div class="login-error">
                    @foreach($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-field">
                    <label for="username">
                        <i class="fa fa-user"></i>
                        Username
                    </label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" 
                           placeholder="Masukkan username" required autofocus>
                </div>
                <div class="login-field">
                    <label for="password">
                        <i class="fa fa-lock"></i>
                        Password
                    </label>
                    <input type="password" id="password" name="password" 
                           placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="login-btn">
                    <span>Masuk</span>
                    <i class="fa fa-arrow-right"></i>
                </button>
            </form>

            <div class="login-footer">
                <a href="{{ url('/') }}">
                    <i class="fa fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>
</html>
