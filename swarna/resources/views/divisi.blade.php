@extends('layouts.app')

@section('title', 'Divisi Kami - SWARNA')

@section('content')
<!-- Page Hero Header -->
<section class="page-hero-divisi" style="background: linear-gradient(180deg, rgba(14,13,12,0.85) 0%, rgba(14,13,12,0.95) 100%), url('{{ asset('img/swarna hero.png') }}') center/cover no-repeat; padding: 10rem 0 5rem;">
    <div class="container text-center">
        <span class="section-label" data-aos="fade-up">Keahlian Kami</span>
        <h1 class="section-title" data-aos="fade-up" data-aos-delay="100">Divisi Kreatif <em>SWARNA</em></h1>
        <div class="section-divider" data-aos="fade-up" data-aos-delay="200"><span class="dot"></span></div>
        <p class="lead text-white-50 mx-auto" style="max-width: 600px; font-weight: 300;" data-aos="fade-up" data-aos-delay="300">
            Kami mengintegrasikan warisan budaya Bali dengan kebutuhan industri modern melalui tiga bidang keahlian utama.
        </p>
    </div>
</section>

<!-- Division Sections -->
<section class="divisi-profiles" style="background: var(--black); padding-bottom: 6rem; position: relative; overflow: hidden;">
    <div class="container">
        @foreach($divisis as $index => $divisi)
            <div class="div-profile-wrapper" data-aos="fade-up" style="margin-bottom: 9rem;">
                
                <!-- Alternating Left/Right Grid -->
                <div class="{{ $index % 2 == 1 ? 'div-profile-reverse' : 'div-profile' }}">
                    
                    @if($index % 2 == 0)
                        <!-- Content Column (Left for Even) -->
                        <div class="div-info-content">
                            <div class="div-icon-wrapper">
                                <i class="fa {{ $divisi->icon ?? 'fa-cube' }}"></i>
                            </div>
                            <h2 class="div-title">{{ $divisi->name }}</h2>
                            <h4 class="div-tagline">{{ $divisi->tagline }}</h4>
                            <p class="div-desc">{{ $divisi->description }}</p>
                            
                            <!-- Special Division Stats/Highlights -->
                            <div class="stats-grid">
                                @if($divisi->slug === 'apparel')
                                    <div class="stat-item">
                                        <span class="stat-num">Premium</span>
                                        <span class="stat-label">Bahan & Sablon</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-num">Custom</span>
                                        <span class="stat-label">Desain Bebas</span>
                                    </div>
                                @elseif($divisi->slug === 'decor')
                                    <div class="stat-item">
                                        <span class="stat-num">Handmade</span>
                                        <span class="stat-label">Karya Perajin</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-num">Eksklusif</span>
                                        <span class="stat-label">Detail Estetis</span>
                                    </div>
                                @else
                                    <div class="stat-item">
                                        <span class="stat-num">Modern</span>
                                        <span class="stat-label">Branding Visual</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-num">Kreatif</span>
                                        <span class="stat-label">Solusi Desain</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Image Column (Right for Even) -->
                        <div class="div-visual-card">
                            <div class="card-glow"></div>
                            <img src="{{ $divisi->image ? Storage::url($divisi->image) : asset('img/divisi-' . $divisi->slug . '.png') }}" alt="{{ $divisi->name }}">
                        </div>
                    @else
                        <!-- Image Column (Left for Odd) -->
                        <div class="div-visual-card">
                            <div class="card-glow"></div>
                            <img src="{{ $divisi->image ? Storage::url($divisi->image) : asset('img/divisi-' . $divisi->slug . '.png') }}" alt="{{ $divisi->name }}">
                        </div>

                        <!-- Content Column (Right for Odd) -->
                        <div class="div-info-content">
                            <div class="div-icon-wrapper">
                                <i class="fa {{ $divisi->icon ?? 'fa-cube' }}"></i>
                            </div>
                            <h2 class="div-title">{{ $divisi->name }}</h2>
                            <h4 class="div-tagline">{{ $divisi->tagline }}</h4>
                            <p class="div-desc">{{ $divisi->description }}</p>
                            
                            <!-- Special Division Stats/Highlights -->
                            <div class="stats-grid">
                                @if($divisi->slug === 'apparel')
                                    <div class="stat-item">
                                        <span class="stat-num">Premium</span>
                                        <span class="stat-label">Bahan & Sablon</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-num">Custom</span>
                                        <span class="stat-label">Desain Bebas</span>
                                    </div>
                                @elseif($divisi->slug === 'decor')
                                    <div class="stat-item">
                                        <span class="stat-num">Handmade</span>
                                        <span class="stat-label">Karya Perajin</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-num">Eksklusif</span>
                                        <span class="stat-label">Detail Estetis</span>
                                    </div>
                                @else
                                    <div class="stat-item">
                                        <span class="stat-num">Modern</span>
                                        <span class="stat-label">Branding Visual</span>
                                    </div>
                                    <div class="stat-item">
                                        <span class="stat-num">Kreatif</span>
                                        <span class="stat-label">Solusi Desain</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection