@extends('layouts.admin')

@section('title', 'SWARNA - Divisi - Admin')

@section('content')
<section class="admin-section">
    <div class="page-header mb-4">
        <div>
            <h2 class="section-title text-white">Kelola Divisi Kreatif</h2>
            <p class="section-description text-white-50">Sesuaikan informasi, tagline, deskripsi, ikon, dan gambar representasi divisi SWARNA.</p>
        </div>
        <a href="{{ url('/divisi') }}" target="_blank" class="btn btn-outline-warning btn-sm">
            👁 Lihat Divisi Publik
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

    <div class="data-card">
        <div class="data-card-header">
            <h5 class="text-white">📁 Daftar Divisi</h5>
        </div>
        <div class="data-card-body p-0">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Gambar</th>
                            <th style="width: 60px; text-align: center;">Ikon</th>
                            <th>Nama Divisi</th>
                            <th>Tagline / Slogan</th>
                            <th>Deskripsi Ringkas</th>
                            <th style="width: 120px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->image ? Storage::url($item->image) : asset('img/divisi-' . $item->slug . '.png') }}" class="table-image" alt="{{ $item->name }}" style="width: 80px; height: 50px; object-fit: cover;">
                                </td>
                                <td class="align-middle text-center">
                                    <span class="fs-4 text-warning">
                                        <i class="fa {{ $item->icon ?? 'fa-cube' }}"></i>
                                    </span>
                                </td>
                                <td class="align-middle fw-semibold text-white">{{ $item->name }}</td>
                                <td class="align-middle text-white-50">{{ $item->tagline }}</td>
                                <td class="align-middle text-white-50">
                                    {{ Str::limit($item->description, 100) }}
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.divisi.edit', $item) }}" class="btn btn-edit btn-sm py-1 px-2 text-warning border-warning bg-transparent">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-white-50">Belum ada divisi yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection