@extends('layouts.app')
@section('title', 'Kontak - SWARNA')
@section('content')

<section class="page-hero-divisi" style="background: linear-gradient(180deg, rgba(14,13,12,0.85) 0%, rgba(14,13,12,0.95) 100%), url('{{ asset('img/swarna hero.png') }}') center/cover no-repeat; padding: 10rem 0 5rem;">
    <div class="container text-center">
        <span class="section-label" data-aos="fade-up">Hubungi Kami</span>
        <h1 class="section-title" data-aos="fade-up" data-aos-delay="100">Kontak <em>SWARNA</em></h1>
        <div class="section-divider" data-aos="fade-up" data-aos-delay="200"><span class="dot"></span></div>
        <p class="lead text-white-50 mx-auto" style="max-width: 600px; font-weight: 300;" data-aos="fade-up" data-aos-delay="300">
            Punya ide atau pertanyaan? Kami siap mendengar dan membantu.
        </p>
    </div>
</section>

<section style="background: var(--deep); padding: 6rem 0;">
    <div class="section-inner">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: var(--container-lg); margin: 0 auto;">
            
            <div data-aos="fade-right">
                <span class="section-label" style="text-align: left; margin-bottom: 1.5rem;">Info Kontak</span>
                <h2 style="font-family: var(--font-display); font-size: clamp(1.8rem,3vw,2.5rem); font-weight: 300; color: var(--white); letter-spacing: 2px; margin-bottom: 2rem;">
                    Mari <em style="color: var(--gold-lt); font-style: italic;">Berkolaborasi</em>
                </h2>
                <p style="color: rgba(245,240,235,.6); font-size: .9rem; line-height: 1.9; margin-bottom: 3rem; letter-spacing: .3px;">
                    Kami selalu terbuka untuk diskusi, kolaborasi, dan proyek baru. 
                    Jangan ragu untuk menghubungi kami melalui berbagai saluran di bawah ini.
                </p>

                @php
                    $contacts = [
                        ['icon' => 'fa-map-marker-alt', 'label' => 'Lokasi', 'value' => 'Denpasar, Bali, Indonesia'],
                        ['icon' => 'fa-phone-alt', 'label' => 'Telepon', 'value' => '+62 8xx-xxxx-xxxx'],
                        ['icon' => 'fa-envelope', 'label' => 'Email', 'value' => 'hello@swarna.id'],
                        ['icon' => 'fa-clock', 'label' => 'Jam Kerja', 'value' => 'Sen - Sab: 09:00 - 18:00 WITA'],
                    ];
                @endphp
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    @foreach($contacts as $c)
                        <div style="display: flex; align-items: flex-start; gap: 1.2rem; padding: 1.2rem 1.5rem; background: var(--surface); border: 1px solid var(--gold-border); border-radius: var(--radius-md); transition: all .3s ease;"
                             onmouseover="this.style.borderColor='rgba(201,168,76,.5)';this.style.transform='translateX(6px)'"
                             onmouseout="this.style.borderColor='';this.style.transform=''">
                            <div style="width: 42px; height: 42px; border: 1px solid rgba(201,168,76,.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: rgba(201,168,76,.05);">
                                <i class="fa {{ $c['icon'] }}" style="color: var(--gold); font-size: 1rem;"></i>
                            </div>
                            <div>
                                <span style="font-size: .58rem; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); display: block; margin-bottom: .3rem;">{{ $c['label'] }}</span>
                                <span style="font-size: .9rem; color: var(--white); letter-spacing: .5px;">{{ $c['value'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div data-aos="fade-left">
                <div style="background: var(--surface); border: 1px solid var(--gold-border); border-radius: var(--radius-md); padding: 3rem;">
                    @if(session('success'))
                        <div style="background: rgba(76,175,80,.1); border: 1px solid rgba(76,175,80,.25); color: #81c784; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: .85rem;">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    <span style="font-size: .58rem; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); display: block; margin-bottom: .5rem;">Kirim Pesan</span>
                    <h3 style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 400; color: var(--white); letter-spacing: 1px; margin-bottom: 2rem;">
                    Diskusi <em style="color: var(--gold-lt); font-style: italic;">Bersama</em>
                    </h3>

                    <form method="POST" action="{{ url('/contact') }}">
                        @csrf
                        <div style="display: grid; gap: 1.2rem;">
                            <div>
                                <label for="name" style="display: block; font-size: .62rem; letter-spacing: 3px; text-transform: uppercase; color: var(--grey); margin-bottom: .5rem;">Nama</label>
                                <input type="text" id="name" name="name" required
                                    style="width: 100%; padding: .85rem 1rem; background: rgba(201,168,76,.04); border: 1px solid rgba(201,168,76,.15); color: var(--white); font-family: var(--font-body); font-size: .85rem; outline: none; transition: border-color .3s;"
                                    onfocus="this.style.borderColor='rgba(201,168,76,.55)'" onblur="this.style.borderColor=''">
                            </div>
                            <div>
                                <label for="email" style="display: block; font-size: .62rem; letter-spacing: 3px; text-transform: uppercase; color: var(--grey); margin-bottom: .5rem;">Email</label>
                                <input type="email" id="email" name="email" required
                                    style="width: 100%; padding: .85rem 1rem; background: rgba(201,168,76,.04); border: 1px solid rgba(201,168,76,.15); color: var(--white); font-family: var(--font-body); font-size: .85rem; outline: none; transition: border-color .3s;"
                                    onfocus="this.style.borderColor='rgba(201,168,76,.55)'" onblur="this.style.borderColor=''">
                            </div>
                            <div>
                                <label for="message" style="display: block; font-size: .62rem; letter-spacing: 3px; text-transform: uppercase; color: var(--grey); margin-bottom: .5rem;">Pesan</label>
                                <textarea id="message" name="message" rows="5" required
                                    style="width: 100%; padding: .85rem 1rem; background: rgba(201,168,76,.04); border: 1px solid rgba(201,168,76,.15); color: var(--white); font-family: var(--font-body); font-size: .85rem; outline: none; resize: vertical; transition: border-color .3s;"
                                    onfocus="this.style.borderColor='rgba(201,168,76,.55)'" onblur="this.style.borderColor=''"></textarea>
                            </div>
                            <button type="submit" 
                                style="width: 100%; padding: 1rem; background: var(--gold); border: 1px solid var(--gold); color: var(--black); font-family: var(--font-body); font-size: .72rem; font-weight: 500; letter-spacing: 4px; text-transform: uppercase; cursor: pointer; transition: all .3s; border-radius: 4px;"
                                onmouseover="this.style.background='transparent';this.style.color='var(--gold)';this.style.letterSpacing='5px'"
                                onmouseout="this.style.background='var(--gold)';this.style.color='var(--black)';this.style.letterSpacing='4px'">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background: var(--black); padding: 3rem 0;">
    <div class="section-inner">
        <div style="border: 1px solid var(--gold-border); border-radius: var(--radius-md); overflow: hidden; height: 360px; filter: grayscale(.3);">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126214.42171573926!2d115.1456285173828!3d-8.656289999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2409b1e0e1e8f%3A0x4030a559c2cde20!2sDenpasar%2C%20Kota%20Denpasar%2C%20Bali!5e0!3m2!1sid!2sid!4v1712345678901" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
