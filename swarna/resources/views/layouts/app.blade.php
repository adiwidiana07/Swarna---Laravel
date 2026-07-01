<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SWARNA')</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('aos-master/aos-master/dist/aos.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body>
<nav id="navbar">
<a class="nav-brand" href="#">
  <img src="{{ asset('img/SWARNA-removebg-preview.png') }}" alt="Swarna Logo" 
  style="width:42px;height:42px;object-fit:contain;">
  <span class="brand-name">SWARNA</span>
</a>

  <button class="nav-toggle" id="navToggle" aria-label="Menu">
    <span class="fa fa-bars"></span>
  </button>

  <ul class="nav-links" id="navLinks">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/#about') }}">About</a></li>
    <li><a href="{{ url('/divisi') }}">Divisi</a></li>
    <li><a href="{{ url('/gallery') }}">Galeri</a></li>
    <li><a href="{{ url('/#cta') }}">Kontak</a></li>
  </ul>
<a href="{{ route('login') }}" class="btn-nav-login">Masuk</a>
</nav>
    @yield('content')
    <footer id="footer">
  <div class="footer-inner">

    <div class="footer-top">

      <!-- Brand col -->
      <div class="footer-brand">
        <span class="brand-name">SWARNA</span>
        <span class="brand-tagline">Local Culture &nbsp;·&nbsp; Modern Identity</span>
        <p>Studio kreatif Bali yang menjembatani tradisi dan modernitas. Kami percaya identitas lokal adalah kekuatan terbesar.</p>
        <div class="social-row">
          <!-- Instagram -->
          <a href="#" class="social-btn" aria-label="Instagram">
            <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <!-- TikTok-like -->
          <a href="#" class="social-btn" aria-label="TikTok">
            <svg viewBox="0 0 24 24"><path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/></svg>
          </a>
          <!-- WhatsApp -->
          <a href="#" class="social-btn" aria-label="WhatsApp">
            <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
          </a>
        </div>
      </div>

      <!-- Nav col -->
      <div class="footer-col">
        <h4>Navigasi</h4>
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#gallery">Galeri</a></li>
          <li><a href="#cta">Kolaborasi</a></li>
        </ul>
      </div>

      <!-- Contact col -->
      <div class="footer-col">
        <h4>Kontak</h4>
        <div class="footer-contact-item">
          <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>Denpasar, Bali<br>Indonesia</span>
        </div>
        <div class="footer-contact-item">
          <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8 19.79 19.79 0 01.1 1.2 2 2 0 012.11 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.09a16 16 0 006 6l.46-.46a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
          <span>+62 8xx-xxxx-xxxx</span>
        </div>
        <div class="footer-contact-item">
          <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <span>hello@swarna.id</span>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© 2025 <span class="gold-accent">SWARNA</span> Production. All rights reserved.</p>
      <p>Crafted with care in <span class="gold-accent">Bali</span></p>
    </div>

  </div>
</footer>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fontawesome-free-6.4.0-web/js/all.min.js') }}"></script>
    <script src="{{ asset('aos-master/aos-master/dist/aos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>