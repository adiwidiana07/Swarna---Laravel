@extends('layouts.app')
@section('title', 'SWARNA - Home')
@section('content')

{{-- ════════════ HERO ════════════ --}}
<section id="hero" aria-label="Hero">
  <div class="hero-parallax" id="heroBg"
       style="background-image: url('{{ $home->hero_bg_image ? Storage::url($home->hero_bg_image) : asset('img/Swarna-hero.png') }}')">
  </div>
  <div class="hero-overlay" aria-hidden="true"></div>

  <div class="hero-body">
    <p class="hero-eyebrow">{{ $home->hero_eyebrow }}</p>

    <h1 class="hero-title">
      {{ $home->hero_title }}
      <strong>{{ $home->hero_subtitle }}</strong>
    </h1>

    <div class="hero-cta">
      <a href="#about" class="btn-gold">{{ $home->hero_btn1_text }}</a>
      <a href="{{ url('divisi') }}" class="btn-outline">{{ $home->hero_btn2_text }}</a>
    </div>
  </div>

  <div class="scroll-hint" aria-hidden="true">
    <div class="line"></div>
    <span>Scroll</span>
  </div>
</section>


{{-- ════════════ ABOUT ════════════ --}}
<section id="about" aria-labelledby="about-heading">
  <div class="section-inner">

    <p class="section-label">{{ $home->about_label }}</p>

    <h2 id="about-heading" class="section-title">
      {!! nl2br(e($home->about_title)) !!}
    </h2>

    <p class="about-desc">{{ $home->about_description }}</p>

    {{-- Portfolio --}}
    <h2 class="section-title">Portfolio</h2>

    <div class="portfolio-grid">
      @php
        $brandLogos = [
          ['img' => $home->brand_logo1_image, 'name' => $home->brand_logo1_name ?? 'Apparel', 'default' => 'img/logo-apparel.svg', 'desc' => 'Pakaian & Tekstil'],
          ['img' => $home->brand_logo2_image, 'name' => $home->brand_logo2_name ?? 'Design',  'default' => 'img/logo-design.svg',   'desc' => 'Desain Visual'],
          ['img' => $home->brand_logo3_image, 'name' => $home->brand_logo3_name ?? 'Decor',   'default' => 'img/logo-decor.svg',    'desc' => 'Dekorasi & Seni'],
        ];
      @endphp

      @foreach($brandLogos as $logo)
        <article class="portfolio-card">
          <div class="portfolio-img-wrap">
            <img src="{{ $logo['img'] ? Storage::url($logo['img']) : asset($logo['default']) }}"
                 alt="{{ $logo['name'] }}"
                 class="portfolio-img"
                 loading="lazy">
            <div class="portfolio-card-overlay" aria-hidden="true">
              <a href="{{ url('/gallery') }}" class="portfolio-view-btn" tabindex="-1">Lihat Karya</a>
            </div>
          </div>
          <div class="portfolio-card-info">
            <a href="{{ url('/gallery') }}" class="portfolio-card-link" aria-label="Lihat karya {{ $logo['name'] }}">
              <span class="portfolio-card-name">{{ $logo['name'] }}</span>
            </a>
            <span class="portfolio-card-desc">{{ $logo['desc'] }}</span>
          </div>
        </article>
      @endforeach
    </div>
  </div>

  {{-- About History --}}
  <div class="about-history">
    <div class="about-history-image">
      <img src="{{ $home->about_image ? Storage::url($home->about_image) : asset('img/swarna hero.png') }}"
           alt="Tentang Swarna — studio kreatif Bali"
           loading="lazy">
    </div>

    <div class="about-history-content">
      <p class="about-history-label">{{ $home->about_history_label }}</p>

      <h3 class="about-history-title">{{ $home->about_history_title }}</h3>

      <p>{{ $home->about_history_text1 }}</p>

      <p>{{ $home->about_history_text2 }}</p>
    </div>
  </div>
</section>


{{-- ════════════ CTA ════════════ --}}
<section id="cta" aria-labelledby="cta-heading">
  <div class="section-inner">

    <p class="section-label">{{ $home->cta_label }}</p>

    <h2 id="cta-heading" class="section-title">{{ $home->cta_title }}</h2>

    <div class="section-divider" aria-hidden="true"><span class="dot"></span></div>

    <p class="cta-tagline">{{ $home->cta_tagline }}</p>

    <div class="cta-grid">

      {{-- CTA 1 --}}
      <div class="cta-card">
        <div class="cta-icon" aria-hidden="true">
          <i class="fa fa-tshirt"></i>
        </div>
        <h3>Pesan Baju / Desain</h3>
        <p>Custom apparel &amp; desain grafis dengan sentuhan<br>estetika Bali yang khas.</p>
        <a href="https://wa.me/{{ $home->cta_wa_number }}?text=Halo%20SWARNA%2C%20saya%20ingin%20pesan%20baju%2Fdesain"
           class="btn-gold"
           target="_blank"
           rel="noopener noreferrer">
          Pesan Sekarang
        </a>
      </div>

      {{-- CTA 2 --}}
      <div class="cta-card">
        <div class="cta-icon" aria-hidden="true">
          <i class="fa fa-handshake"></i>
        </div>
        <h3>Kolaborasi</h3>
        <p>Bangun proyek bersama — brand, event,<br>atau kampanye kreatif.</p>
        <a href="mailto:{{ $home->cta_email }}" class="btn-outline">Hubungi Kami</a>
      </div>

    </div>
  </div>
</section>

<style>
/* Portfolio card link — remove default link style, wrap name */
.portfolio-card-link {
  text-decoration: none;
  color: inherit;
  display: block;
}
.portfolio-card-link:hover .portfolio-card-name {
  color: var(--gold-lt);
  transition: color 0.3s;
}
</style>
@endsection