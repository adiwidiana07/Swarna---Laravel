@extends('layouts.admin')

@section('title', 'SWARNA - Edit Divisi - Admin')

@section('content')
<section class="admin-section">
    <div class="page-header mb-4">
        <div>
            <h2 class="section-title text-white">Edit Divisi: {{ $divisi->name }}</h2>
            <p class="section-description text-white-50">Perbarui rincian, gambar, dan tata letak untuk divisi ini.</p>
        </div>
        <a href="{{ route('admin.divisi') }}" class="btn btn-outline-light btn-sm">
            ⬅ Kembali ke Daftar
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="data-card">
                <div class="data-card-header">
                    <h5 class="text-white">✍ Form Edit Konten</h5>
                </div>
                <div class="data-card-body">
                    <form action="{{ route('admin.divisi.update', $divisi) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white fw-semibold">Nama Divisi</label>
                                <input type="text" name="name" class="form-control bg-dark text-white border-secondary" value="{{ old('name', $divisi->name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white fw-semibold">FontAwesome Ikon Class</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-warning">
                                        <i class="fa {{ old('icon', $divisi->icon) ?? 'fa-cube' }}"></i>
                                    </span>
                                    <input type="text" name="icon" class="form-control bg-dark text-white border-secondary" value="{{ old('icon', $divisi->icon) }}" placeholder="Contoh: fa-tshirt" required>
                                </div>
                                <small class="text-white-50 d-block mt-1">Kelas FontAwesome 6, contoh: `fa-tshirt`, `fa-couch`, `fa-drafting-compass`.</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">Tagline / Slogan Divisi</label>
                            <input type="text" name="tagline" class="form-control bg-dark text-white border-secondary" value="{{ old('tagline', $divisi->tagline) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">Deskripsi Lengkap</label>
                            <textarea name="description" rows="6" class="form-control bg-dark text-white border-secondary" required style="line-height: 1.6;">{{ old('description', $divisi->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">Upload Gambar Baru (Opsional)</label>
                            <input type="file" name="image" class="form-control bg-dark text-white border-secondary" accept="image/*">
                            <small class="text-white-50 d-block mt-1">Format: JPG, JPEG, PNG, WEBP. Maksimal: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-4">
                            <a href="{{ route('admin.divisi') }}" class="btn btn-secondary text-white border-secondary bg-transparent px-4">Batal</a>
                            <button type="submit" class="btn btn-warning fw-semibold text-dark px-4">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="data-card">
                <div class="data-card-header">
                    <h5 class="text-white">🖼 Preview Gambar Saat Ini</h5>
                </div>
                <div class="data-card-body text-center">
                    <div class="current-image-preview mb-3" style="border: 1px solid rgba(201, 168, 76, 0.25); border-radius: 12px; overflow: hidden; background: #000;">
                        <img src="{{ $divisi->image ? Storage::url($divisi->image) : asset('img/divisi-' . $divisi->slug . '.png') }}" class="img-fluid" alt="{{ $divisi->name }}" style="max-height: 250px; width: 100%; object-fit: cover;">
                    </div>
                    <span class="badge bg-warning text-dark px-3 py-2 fs-7">
                        {{ $divisi->image ? 'Menggunakan Gambar Custom' : 'Menggunakan Gambar Default' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
