@extends('layouts.admin')

@section('title', 'SWARNA - Home - Admin')

@section('content')

<section class="admin-section">

    <div class="page-header mb-4">
        <div>
            <h2 class="section-title text-white">Kelola Konten Home</h2>
            <p class="section-description text-white-50">Edit konten yang ditampilkan di halaman utama publik.</p>
        </div>
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-warning btn-sm">
            👁 Lihat Halaman Publik
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Alert error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- ═══════════════ HERO ═══════════════ --}}
        <div class="data-card mb-4">
            <div class="data-card-header">
                <h5 class="text-white">🏠 Section Hero</h5>
                <p class="text-white-50 small mb-0">Banner utama yang tampil pertama kali saat pengunjung membuka situs.</p>
            </div>
            <div class="data-card-body">
                <div class="row g-3">
                    <div class="col-12 border-bottom pb-3 mb-2">
                        <label class="form-label fw-semibold text-white">Hero Background Image</label>
                        <div class="d-flex align-items-center gap-3">
                            <div class="image-preview-container">
                                @if($home->hero_bg_image)
                                    <img src="{{ Storage::url($home->hero_bg_image) }}" class="img-thumbnail rounded" style="max-height: 120px; min-width: 150px; object-fit: cover;" alt="Hero Background">
                                @else
                                    <img src="{{ asset('img/Swarna-hero.png') }}" class="img-thumbnail rounded text-muted" style="max-height: 120px; min-width: 150px; object-fit: cover;" alt="Hero Background Default (Fallback)">
                                @endif
                            </div>
                            <div>
                                <input type="file" name="hero_bg_image" class="form-control @error('hero_bg_image') is-invalid @enderror">
                                <small class="text-white-50 d-block mt-1">Format: JPG, JPEG, PNG, WEBP, GIF. Maks: 2MB. Kosongkan jika tidak ingin mengubah.</small>
                                @error('hero_bg_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-white">Eyebrow Text <small class="text-white-50">(teks kecil di atas judul)</small></label>
                        <input type="text" name="hero_eyebrow" class="form-control @error('hero_eyebrow') is-invalid @enderror"
                            value="{{ old('hero_eyebrow', $home->hero_eyebrow) }}" placeholder="Bali · Indonesia">
                        @error('hero_eyebrow') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-white">Judul Utama</label>
                        <input type="text" name="hero_title" class="form-control @error('hero_title') is-invalid @enderror"
                            value="{{ old('hero_title', $home->hero_title) }}" placeholder="SWARNA">
                        @error('hero_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-white">Sub Judul (tebal)</label>
                        <input type="text" name="hero_subtitle" class="form-control @error('hero_subtitle') is-invalid @enderror"
                            value="{{ old('hero_subtitle', $home->hero_subtitle) }}" placeholder="Production">
                        @error('hero_subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-white">Teks Tombol 1</label>
                        <input type="text" name="hero_btn1_text" class="form-control @error('hero_btn1_text') is-invalid @enderror"
                            value="{{ old('hero_btn1_text', $home->hero_btn1_text) }}" placeholder="Kenali Swarna">
                        @error('hero_btn1_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-white">Teks Tombol 2</label>
                        <input type="text" name="hero_btn2_text" class="form-control @error('hero_btn2_text') is-invalid @enderror"
                            value="{{ old('hero_btn2_text', $home->hero_btn2_text) }}" placeholder="Divisi Swarna">
                        @error('hero_btn2_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══════════════ ABOUT ═══════════════ --}}
        <div class="data-card mb-4">
            <div class="data-card-header">
                <h5 class="text-white">📖 Section About</h5>
                <p class="text-white-50 small mb-0">Informasi tentang SWARNA yang tampil di halaman home.</p>
            </div>
            <div class="data-card-body">
                <div class="row g-3">
                    <div class="col-12 border-bottom pb-3 mb-2">
                        <label class="form-label fw-semibold text-white">About History Image</label>
                        <div class="d-flex align-items-center gap-3">
                            <div class="image-preview-container">
                                @if($home->about_image)
                                    <img src="{{ Storage::url($home->about_image) }}" class="img-thumbnail rounded" style="max-height: 120px; min-width: 150px; object-fit: cover;" alt="About History Image">
                                @else
                                    <img src="{{ asset('img/about-swarna.jpg') }}" class="img-thumbnail rounded text-muted" style="max-height: 120px; min-width: 150px; object-fit: cover;" alt="About History Default (Fallback)">
                                @endif
                            </div>
                            <div>
                                <input type="file" name="about_image" class="form-control @error('about_image') is-invalid @enderror">
                                <small class="text-white-50 d-block mt-1">Format: JPG, JPEG, PNG, WEBP, GIF. Maks: 2MB. Kosongkan jika tidak ingin mengubah.</small>
                                @error('about_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-white">Label Section</label>
                        <input type="text" name="about_label" class="form-control @error('about_label') is-invalid @enderror"
                            value="{{ old('about_label', $home->about_label) }}" placeholder="Tentang Kami">
                        @error('about_label') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-9">
                        <label class="form-label fw-semibold text-white">Judul Section</label>
                        <input type="text" name="about_title" class="form-control @error('about_title') is-invalid @enderror"
                            value="{{ old('about_title', $home->about_title) }}" placeholder="Warisan Budaya, Estetika Modern">
                        @error('about_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-white">Deskripsi Singkat</label>
                        <textarea name="about_description" rows="3" class="form-control @error('about_description') is-invalid @enderror"
                            placeholder="Deskripsi singkat SWARNA...">{{ old('about_description', $home->about_description) }}</textarea>
                        @error('about_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- ─── BRAND LOGOS ─── --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold mb-3 text-white">🎨 Brand Logos</label>
                        <p class="text-white-50 small mb-3">Logo yang tampil di baris brand di bawah deskripsi. Kosongkan gambar jika tidak ingin mengubah.</p>
                        <div class="row g-3">
                            @foreach([1,2,3] as $i)
                            @php
                                $imgField  = "brand_logo{$i}_image";
                                $nameField = "brand_logo{$i}_name";
                                $defaults  = ['<i class="fa fa-apple"></i>', '<i class="fa fa-tshirt"></i>', '<i class="fa fa-paint-brush"></i>', '<i class="fa fa-couch"></i>', 'img/logo-design.svg', 'img/logo-decor.svg'];
                            @endphp
                            <div class="col-md-4">
                                <div class="border rounded p-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        @if($home->$imgField)
                                            <img src="{{ Storage::url($home->$imgField) }}" alt="Logo {{ $i }}" style="width:48px;height:48px;object-fit:contain;border:1px solid #ddd;border-radius:6px;padding:4px;">
                                        @else
                                            <img src="{{ asset($defaults[$i-1]) }}" alt="Logo Default {{ $i }}" style="width:48px;height:48px;object-fit:contain;border:1px solid #eee;border-radius:6px;padding:4px;">
                                        @endif
                                        <div class="flex-fill">
                                            <small class="text-white-50 fw-semibold">Logo {{ $i }}</small>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label small mb-1 text-white">Gambar Logo</label>
                                        <input type="file" name="{{ $imgField }}" class="form-control form-control-sm @error($imgField) is-invalid @enderror" accept="image/*">
                                        @error($imgField) <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div>
                                        <label class="form-label small mb-1 text-white">Nama Brand</label>
                                        <input type="text" name="{{ $nameField }}" class="form-control form-control-sm @error($nameField) is-invalid @enderror"
                                            value="{{ old($nameField, $home->$nameField) }}" placeholder="Nama Brand">
                                        @error($nameField) <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-white">Label Sejarah</label>
                        <input type="text" name="about_history_label" class="form-control @error('about_history_label') is-invalid @enderror"
                            value="{{ old('about_history_label', $home->about_history_label) }}" placeholder="Sejarah">
                        @error('about_history_label') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-9">
                        <label class="form-label fw-semibold text-white">Judul Sejarah</label>
                        <input type="text" name="about_history_title" class="form-control @error('about_history_title') is-invalid @enderror"
                            value="{{ old('about_history_title', $home->about_history_title) }}" placeholder="Perjalanan SWARNA">
                        @error('about_history_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-white">Paragraf Sejarah 1</label>
                        <textarea name="about_history_text1" rows="3" class="form-control @error('about_history_text1') is-invalid @enderror"
                            placeholder="Paragraf pertama...">{{ old('about_history_text1', $home->about_history_text1) }}</textarea>
                        @error('about_history_text1') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-white">Paragraf Sejarah 2</label>
                        <textarea name="about_history_text2" rows="3" class="form-control @error('about_history_text2') is-invalid @enderror"
                            placeholder="Paragraf kedua...">{{ old('about_history_text2', $home->about_history_text2) }}</textarea>
                        @error('about_history_text2') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══════════════ CTA ═══════════════ --}}
        <div class="data-card mb-4">
            <div class="data-card-header">
                <h5 class="text-white">📣 Section CTA (Call to Action)</h5>
                <p class="text-white-50 small mb-0">Ajakan di bagian bawah halaman Home untuk menghubungi atau memesan.</p>
            </div>
            <div class="data-card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-white">Label Section</label>
                        <input type="text" name="cta_label" class="form-control @error('cta_label') is-invalid @enderror"
                            value="{{ old('cta_label', $home->cta_label) }}" placeholder="Mulai Bersama Kami">
                        @error('cta_label') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-8">
                        <label class="form-label fw-semibold text-white">Judul CTA</label>
                        <input type="text" name="cta_title" class="form-control @error('cta_title') is-invalid @enderror"
                            value="{{ old('cta_title', $home->cta_title) }}" placeholder="Wujudkan Visimu">
                        @error('cta_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-white">Tagline / Deskripsi CTA</label>
                        <textarea name="cta_tagline" rows="2" class="form-control @error('cta_tagline') is-invalid @enderror"
                            placeholder="Tagline singkat...">{{ old('cta_tagline', $home->cta_tagline) }}</textarea>
                        @error('cta_tagline') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-white">Nomor WhatsApp <small class="text-white-50">(tanpa +, contoh: 6281234567890)</small></label>
                        <div class="input-group">
                            <span class="input-group-text">wa.me/</span>
                            <input type="text" name="cta_wa_number" class="form-control @error('cta_wa_number') is-invalid @enderror"
                                value="{{ old('cta_wa_number', $home->cta_wa_number) }}" placeholder="628xxxxxxxxxx">
                        </div>
                        @error('cta_wa_number') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-white">Email Kontak</label>
                        <input type="email" name="cta_email" class="form-control @error('cta_email') is-invalid @enderror"
                            value="{{ old('cta_email', $home->cta_email) }}" placeholder="hello@swarna.id">
                        @error('cta_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="d-flex justify-content-end gap-2 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-warning px-4 fw-semibold">
                💾 Simpan Perubahan
            </button>
        </div>

    </form>

</section>
@endsection