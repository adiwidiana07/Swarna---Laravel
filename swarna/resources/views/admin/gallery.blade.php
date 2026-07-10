@extends('layouts.admin')

@section('title', 'SWARNA - Galeri - Admin')

@section('content')
<section class="admin-section">
    <div class="page-header mb-4">
        <div>
            <h2 class="section-title text-white">Kelola Galeri Karya</h2>
            <p class="section-description text-white-50">Tambahkan atau hapus foto karya dan portofolio SWARNA.</p>
        </div>
        <a href="{{ url('/gallery') }}" target="_blank" class="btn btn-outline-warning btn-sm">
            👁 Lihat Galeri Publik
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Alert error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">
        <!-- FORM TAMBAH -->
        <div class="col-lg-4">
            <div class="data-card">
                <div class="data-card-header">
                    <h5 class="text-white">✨ Tambah Karya Baru</h5>
                </div>
                <div class="data-card-body">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">Judul Karya</label>
                            <input type="text" name="title" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Desain Batik Modern" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">Kategori</label>
                            <select name="category" class="form-select bg-dark text-white border-secondary" required>
                                <option value="Desain">Desain</option>
                                <option value="Produksi">Produksi</option>
                                <option value="Seni">Seni</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">File Gambar</label>
                            <input type="file" name="image" class="form-control bg-dark text-white border-secondary" accept="image/*" required>
                            <small class="text-white-50 d-block mt-1">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB.</small>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 fw-semibold text-dark mt-2">
                            ➕ Tambah ke Galeri
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- DAFTAR ITEM -->
        <div class="col-lg-8">
            <div class="data-card">
                <div class="data-card-header">
                    <h5 class="text-white">📸 Daftar Karya di Galeri</h5>
                </div>
                <div class="data-card-body p-0">
                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul Karya</th>
                                    <th>Kategori</th>
                                    <th style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ str_starts_with($item->image, 'img/') ? asset($item->image) : Storage::url($item->image) }}" class="table-image" alt="{{ $item->title }}">
                                        </td>
                                        <td class="align-middle fw-semibold text-white">{{ $item->title }}</td>
                                        <td class="align-middle"><span class="badge bg-warning text-dark">{{ $item->category }}</span></td>
                                        <td class="align-middle">
                                            <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm py-1 px-2">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-white-50">Belum ada karya yang diunggah.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
