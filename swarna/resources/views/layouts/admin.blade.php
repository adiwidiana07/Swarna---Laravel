<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SWARNA') - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
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
        <div class="top-nav-right">
            <span class="top-nav-user">
                <i class="fa fa-user-circle"></i>
                {{ Auth::user()->username ?? 'Admin' }}
            </span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="btn-logout-nav" title="Keluar">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>
    <div class="sidebar">
        <div class="sidebar-brand">
            <span class="brand-name">SWARNA</span>
            <span class="brand-tagline">Admin Panel</span>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-chart-pie"></i> Dashboard
            </a></li>
            <li><a href="{{ route('admin.home') }}" class="{{ request()->routeIs('admin.home') ? 'active' : '' }}">
                <i class="fa fa-home"></i> Home
            </a></li>
            <li><a href="{{ route('admin.gallery') }}" class="{{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
                <i class="fa fa-images"></i> Galeri
            </a></li>
            <li><a href="{{ route('admin.divisi') }}" class="{{ request()->routeIs('admin.divisi*') ? 'active' : '' }}">
                <i class="fa fa-layer-group"></i> Divisi
            </a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="sidebar-link" target="_blank">
                <i class="fa fa-external-link-alt"></i> Lihat Situs
            </a>
        </div>
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
    <script src="{{ asset('fontawesome-free-6.4.2-web/js/all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>