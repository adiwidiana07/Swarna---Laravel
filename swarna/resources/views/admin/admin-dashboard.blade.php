@extends('layouts.admin')

@section('title', 'SWARNA - Dashboard - Admin')

@section('content')
  <section id="admin-dashboard">
    <div class="page-header">
        <div>
            <h2 class="dashboard-title section-title text-white">Dashboard</h2>
            <p class="dashboard-description section-description text-white-50">
                Selamat datang di dashboard admin <strong>SWARNA</strong>. Kelola konten dan pengaturan situs Anda dengan mudah.
            </p>
        </div>
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-warning btn-sm" style="display: inline-flex; align-items: center; gap: .5rem; padding: .6rem 1.2rem; border: 1px solid var(--gold-dim); color: var(--gold); text-decoration: none; border-radius: 8px; font-size: .78rem; transition: all .2s; white-space: nowrap;">
            <i class="fa fa-external-link-alt"></i> Lihat Situs
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
        <div class="stat-card" style="background: linear-gradient(135deg, rgba(201,168,76,.12) 0%, rgba(201,168,76,.04) 100%); border: 1px solid rgba(201,168,76,.2); border-radius: 14px; padding: 1.8rem; transition: all .3s ease;"
             onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 30px rgba(201,168,76,.12)'"
             onmouseout="this.style.transform='';this.style.boxShadow=''">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 48px; height: 48px; background: rgba(201,168,76,.15); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa fa-images" style="color: var(--gold); font-size: 1.3rem;"></i>
                </div>
                <div>
                    <span style="font-size: 2rem; font-weight: 600; color: var(--white); font-family: var(--font-display);">{{ $galleryCount }}</span>
                    <span style="display: block; font-size: .7rem; letter-spacing: 2px; text-transform: uppercase; color: var(--grey); margin-top: .2rem;">Karya Gallery</span>
                </div>
            </div>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, rgba(201,168,76,.12) 0%, rgba(201,168,76,.04) 100%); border: 1px solid rgba(201,168,76,.2); border-radius: 14px; padding: 1.8rem; transition: all .3s ease;"
             onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 30px rgba(201,168,76,.12)'"
             onmouseout="this.style.transform='';this.style.boxShadow=''">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 48px; height: 48px; background: rgba(201,168,76,.15); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa fa-layer-group" style="color: var(--gold); font-size: 1.3rem;"></i>
                </div>
                <div>
                    <span style="font-size: 2rem; font-weight: 600; color: var(--white); font-family: var(--font-display);">{{ $divisiCount }}</span>
                    <span style="display: block; font-size: .7rem; letter-spacing: 2px; text-transform: uppercase; color: var(--grey); margin-top: .2rem;">Divisi Aktif</span>
                </div>
            </div>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, rgba(201,168,76,.12) 0%, rgba(201,168,76,.04) 100%); border: 1px solid rgba(201,168,76,.2); border-radius: 14px; padding: 1.8rem; transition: all .3s ease;"
             onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 30px rgba(201,168,76,.12)'"
             onmouseout="this.style.transform='';this.style.boxShadow=''">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 48px; height: 48px; background: rgba(201,168,76,.15); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa fa-home" style="color: var(--gold); font-size: 1.3rem;"></i>
                </div>
                <div>
                    <span style="font-size: 1rem; font-weight: 600; color: var(--white);">Kelola</span>
                    <span style="display: block; font-size: .7rem; letter-spacing: 2px; text-transform: uppercase; color: var(--grey); margin-top: .2rem;">Konten Home</span>
                </div>
            </div>
            <a href="{{ route('admin.home') }}" style="display: inline-flex; align-items: center; gap: .5rem; margin-top: 1rem; padding: .5rem 1rem; background: var(--gold); color: var(--black); text-decoration: none; border-radius: 8px; font-size: .72rem; font-weight: 500; letter-spacing: 1px; transition: all .2s;">
                <i class="fa fa-edit"></i> Edit Konten
            </a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
        <div class="data-card">
            <div class="data-card-header">
                <h5 class="text-white"><i class="fa fa-bolt"></i> Aksi Cepat</h5>
            </div>
            <div class="data-card-body">
                <div style="display: grid; gap: .8rem;">
                    <a href="{{ route('admin.gallery') }}" style="display: flex; align-items: center; gap: .8rem; padding: .8rem 1rem; background: rgba(201,168,76,.06); border: 1px solid rgba(201,168,76,.12); border-radius: 10px; color: var(--white); text-decoration: none; transition: all .2s;"
                       onmouseover="this.style.background='rgba(201,168,76,.12)'" onmouseout="this.style.background=''">
                        <i class="fa fa-plus-circle" style="color: var(--gold);"></i>
                        <span>Tambah Karya Baru ke Galeri</span>
                        <i class="fa fa-chevron-right" style="margin-left: auto; color: var(--gold-dim); font-size: .8rem;"></i>
                    </a>
                    <a href="{{ route('admin.divisi') }}" style="display: flex; align-items: center; gap: .8rem; padding: .8rem 1rem; background: rgba(201,168,76,.06); border: 1px solid rgba(201,168,76,.12); border-radius: 10px; color: var(--white); text-decoration: none; transition: all .2s;"
                       onmouseover="this.style.background='rgba(201,168,76,.12)'" onmouseout="this.style.background=''">
                        <i class="fa fa-edit" style="color: var(--gold);"></i>
                        <span>Edit Informasi Divisi</span>
                        <i class="fa fa-chevron-right" style="margin-left: auto; color: var(--gold-dim); font-size: .8rem;"></i>
                    </a>
                    <a href="{{ url('/') }}" target="_blank" style="display: flex; align-items: center; gap: .8rem; padding: .8rem 1rem; background: rgba(201,168,76,.06); border: 1px solid rgba(201,168,76,.12); border-radius: 10px; color: var(--white); text-decoration: none; transition: all .2s;"
                       onmouseover="this.style.background='rgba(201,168,76,.12)'" onmouseout="this.style.background=''">
                        <i class="fa fa-eye" style="color: var(--gold);"></i>
                        <span>Lihat Halaman Publik</span>
                        <i class="fa fa-chevron-right" style="margin-left: auto; color: var(--gold-dim); font-size: .8rem;"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="data-card">
            <div class="data-card-header">
                <h5 class="text-white"><i class="fa fa-info-circle"></i> Informasi</h5>
            </div>
            <div class="data-card-body">
                <div style="display: grid; gap: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: .8rem; border-bottom: 1px solid rgba(255,255,255,.05);">
                        <span style="font-size: .82rem; color: rgba(245,240,235,.6);">Status Situs</span>
                        <span style="font-size: .78rem; color: #81c784; display: flex; align-items: center; gap: .4rem;">
                            <span style="width: 6px; height: 6px; background: #81c784; border-radius: 50; display: inline-block;"></span>
                            Aktif
                        </span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: .8rem; border-bottom: 1px solid rgba(255,255,255,.05);">
                        <span style="font-size: .82rem; color: rgba(245,240,235,.6);">Versi</span>
                        <span style="font-size: .78rem; color: var(--gold);">1.0.0</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: .8rem; border-bottom: 1px solid rgba(255,255,255,.05);">
                        <span style="font-size: .82rem; color: rgba(245,240,235,.6);">Admin</span>
                        <span style="font-size: .78rem; color: var(--white);">{{ Auth::user()->username ?? 'Admin' }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: .82rem; color: rgba(245,240,235,.6);">Framework</span>
                        <span style="font-size: .78rem; color: var(--gold);">Laravel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
