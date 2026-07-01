@extends('layouts.app')

@section('title', 'SWARNA - Galeri')

@section('content')
  <!-- Page Hero -->
  <section class="gallery-hero">
    <div class="gallery-hero-bg"></div>
    <div class="gallery-hero-overlay"></div>
    <div class="gallery-hero-body">
      <p class="section-label">Karya Kami</p>
      <h1 class="section-title">Galeri <em>SWARNA</em></h1>
      <div class="section-divider"><span class="dot"></span></div>
      <p class="gallery-hero-sub">Jelajahi koleksi desain dan produksi terbaik kami</p>
    </div>
  </section>

  <section class="gallery-section">
    <div class="gallery-container">

      <!-- Filter Tabs -->
      @php
        $categories = $galleryItems->pluck('category')->unique()->filter()->values();
      @endphp
      @if($categories->count() > 1)
      <div class="gallery-filters" id="galleryFilters">
        <button class="filter-btn active" data-filter="all">Semua</button>
        @foreach($categories as $cat)
          <button class="filter-btn" data-filter="{{ $cat }}">{{ $cat }}</button>
        @endforeach
      </div>
      @endif

      <!-- Masonry Grid -->
      <div class="gallery-grid" id="galleryGrid">
        @forelse($galleryItems as $item)
          <div class="gallery-item" data-category="{{ $item->category }}">
            <div class="gallery-card" onclick="openLightbox('{{ str_starts_with($item->image, 'img/') ? asset($item->image) : Storage::url($item->image) }}', '{{ addslashes($item->title) }}', '{{ $item->category }}')">
              <div class="gallery-image-wrapper">
                <img src="{{ str_starts_with($item->image, 'img/') ? asset($item->image) : Storage::url($item->image) }}"
                     alt="{{ $item->title }}" class="gallery-image" loading="lazy">
                <div class="gallery-overlay">
                  <div class="overlay-content">
                    <p class="overlay-category">{{ $item->category }}</p>
                    <h5 class="overlay-title">{{ $item->title }}</h5>
                    <span class="overlay-icon"><i class="fa fa-expand"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="gallery-empty">
            <i class="fa fa-images"></i>
            <p>Galeri kosong</p>
          </div>
        @endforelse
      </div>

    </div>
  </section>

  <!-- Lightbox -->
  <div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <button class="lightbox-close" onclick="closeLightbox()"><i class="fa fa-times"></i></button>
    <div class="lightbox-inner" onclick="event.stopPropagation()">
      <img src="" alt="" id="lightboxImg">
      <div class="lightbox-info">
        <p id="lightboxCategory"></p>
        <h4 id="lightboxTitle"></h4>
      </div>
    </div>
  </div>

  <script>
    // Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        galleryItems.forEach(item => {
          if (filter === 'all' || item.dataset.category === filter) {
            item.style.display = '';
            item.style.animation = 'fadeUp 0.4s ease forwards';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });

    // Lightbox
    function openLightbox(src, title, category) {
      document.getElementById('lightboxImg').src = src;
      document.getElementById('lightboxTitle').textContent = title;
      document.getElementById('lightboxCategory').textContent = category;
      document.getElementById('lightbox').classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
      document.getElementById('lightbox').classList.remove('active');
      document.body.style.overflow = '';
    }
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
  </script>
@endsection