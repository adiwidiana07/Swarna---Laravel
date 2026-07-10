@extends('layouts.app')
@section('title', 'Tentang Kami - SWARNA')
@section('content')

<section class="page-hero-divisi" style="background: linear-gradient(180deg, rgba(14,13,12,0.85) 0%, rgba(14,13,12,0.95) 100%), url('{{ asset('img/swarna hero.png') }}') center/cover no-repeat; padding: 10rem 0 5rem;">
    <div class="container text-center">
        <span class="section-label" data-aos="fade-up">Tentang Kami</span>
        <h1 class="section-title" data-aos="fade-up" data-aos-delay="100">Kenali <em>SWARNA</em></h1>
        <div class="section-divider" data-aos="fade-up" data-aos-delay="200"><span class="dot"></span></div>
        <p class="lead text-white-50 mx-auto" style="max-width: 600px; font-weight: 300;" data-aos="fade-up" data-aos-delay="300">
            Studio kreatif yang menjembatani warisan budaya Bali dengan estetika modern.
        </p>
    </div>
</section>

<section style="background: var(--deep); padding: 6rem 0;">
    <div class="section-inner">
        <div class="about-history" style="max-width: var(--container-lg); margin: 0 auto; padding: 0; display: grid; grid-template-columns: 1fr 1fr; align-items: center; gap: 5rem;">
            <div class="about-history-image" data-aos="fade-right">
                <div style="position: relative;">
                    <div style="position: absolute; inset: -10px; border: 1px solid rgba(201,168,76,.2); border-radius: 14px; z-index: 0; pointer-events: none; opacity: .5;"></div>
                    <img src="{{ asset('img/swarna hero.png') }}" alt="Tentang SWARNA" style="position: relative; z-index: 1; width: 100%; height: 480px; display: block; object-fit: cover; border-radius: 10px; border: 1px solid rgba(201,168,76,.15); box-shadow: 0 4px 24px rgba(0,0,0,.5);" loading="lazy">
                </div>
            </div>
            <div class="about-history-content" data-aos="fade-left" style="display: flex; flex-direction: column; gap: 1rem;">
                <span class="about-history-label" style="color: var(--gold); text-transform: uppercase; letter-spacing: 5px; font-size: .62rem;">Visi & Misi</span>
                <h3 style="font-family: var(--font-display); font-size: clamp(2rem,4vw,3rem); font-weight: 600; line-height: 1.1; color: var(--white); margin-bottom: .5rem; letter-spacing: 1px;">
                    Menghidupkan Budaya <br><em style="color: var(--gold-lt); font-style: italic;">Melalui Karya</em>
                </h3>
            <p style="color: rgba(245,240,235,.72); font-size: .95rem; line-height: 1.95; letter-spacing: .2px;">
                {{ $home->about_history_text1 ?? 'SWARNA adalah studio kreatif yang lahir dari kecintaan terhadap seni, budaya, dan desain. Kami percaya bahwa identitas lokal adalah kekuatan terbesar dalam menciptakan karya yang bermakna.' }}
            </p>
            <p style="color: rgba(245,240,235,.72); font-size: .95rem; line-height: 1.95; letter-spacing: .2px;">
                {{ $home->about_history_text2 ?? 'Dengan memadukan teknik tradisional Bali dan pendekatan desain kontemporer, kami menghadirkan produk-produk yang tidak hanya estetis, tetapi juga memiliki nilai budaya yang mendalam.' }}
            </p>
            </div>
        </div>
    </div>
</section>

<section style="background: var(--black); padding: 6rem 0;">
    <div class="section-inner">
        <p class="section-label" data-aos="fade-up">Nilai Kami</p>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Prinsip <em>Kreatif</em></h2>
        <div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span class="dot"></span></div>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-top: 3rem; max-width: var(--container-lg); margin-left: auto; margin-right: auto;">
            @php
                $values = [
                    ['icon' => 'fa-hand-holding-heart', 'title' => 'Budaya', 'desc' => 'Setiap karya berakar pada nilai-nilai dan estetika tradisional Bali yang kaya.'],
                    ['icon' => 'fa-paint-brush', 'title' => 'Kreativitas', 'desc' => 'Kami terus berinovasi tanpa batas, menciptakan desain yang segar dan orisinal.'],
                    ['icon' => 'fa-gem', 'title' => 'Kualitas', 'desc' => 'Material terbaik dan pengerjaan teliti untuk hasil yang memuaskan dan tahan lama.'],
                ];
            @endphp
            @foreach($values as $val)
                <div data-aos="fade-up" data-aos-delay="{{ 200 + $loop->index * 100 }}" 
                     style="background: var(--surface); border: 1px solid var(--gold-border); border-radius: var(--radius-md); padding: 3rem 2rem; text-align: center; transition: all .3s ease;"
                     onmouseover="this.style.borderColor='rgba(201,168,76,.5)';this.style.boxShadow='0 20px 50px rgba(201,168,76,.15)';this.style.transform='translateY(-8px)'"
                     onmouseout="this.style.borderColor='';this.style.boxShadow='';this.style.transform=''">
                    <div style="width: 64px; height: 64px; border: 1px solid rgba(201,168,76,.35); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; background: rgba(201,168,76,.05);">
                        <i class="fa {{ $val['icon'] }}" style="color: var(--gold); font-size: 1.4rem;"></i>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 400; color: var(--white); letter-spacing: 2px; margin-bottom: .8rem;">{{ $val['title'] }}</h3>
                    <p style="font-size: .85rem; color: rgba(245,240,235,.5); line-height: 1.85;">{{ $val['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('layouts.partials.cta-reuse')
@endsection
