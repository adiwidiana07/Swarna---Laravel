<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SWARNA') - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body>
    <div class="top-nav">
        <a href="{{ url('/') }}" class="nav-brand">
            <img src="{{ asset('img/SWARNA-removebg-preview.png') }}" alt="Swarna Logo" 
            style="width:42px;height:42px;object-fit:contain;">
            <span class="brand-name">SWARNA</span>
        </a>
    </div>
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.home') }}">Home</a></li>
            <li><a href="{{ route('admin.gallery') }}">Galeri</a></li>
            <li><a href="{{ route('admin.divisi') }}">Divisi</a></li>
        </ul>
    </div>

    <main class="main-content">
        <div class="content">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>© 2026 SWARNA. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fontawesome-free-6.4.0-web/js/all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>