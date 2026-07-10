<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Models\HomeContent;

// ── Public pages ──────────────────────────────────────────────────
Route::get('/', function () {
    $home = HomeContent::getInstance();
    return view('index', compact('home'));
});

Route::get('/divisi', fn() => view('divisi', ['divisis' => \App\Models\Divisi::all()]));
Route::get('/gallery', fn() => view('gallery', ['galleryItems' => \App\Models\Gallery::all()]));
Route::get('/contact', fn() => view('contact'));
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);
    \Illuminate\Support\Facades\Log::info('Contact form submission', $validated);
    return back()->with('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');
});
Route::get('/about', function () {
    $home = \App\Models\HomeContent::getInstance();
    return view('about', compact('home'));
});

// ── Auth ───────────────────────────────────────────────────────────
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ── Admin ──────────────────────────────────────────────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/', function () {
            $galleryCount = \App\Models\Gallery::count();
            $divisiCount = \App\Models\Divisi::count();
            return view('admin.admin-dashboard', compact('galleryCount', 'divisiCount'));
        })->name('dashboard');

        // Home – CRUD konten halaman index
        Route::get('/home',  [AdminHomeController::class, 'index'])->name('home');
        Route::post('/home', [AdminHomeController::class, 'update'])->name('home.update');

        Route::get('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('gallery');
        Route::post('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('/gallery/{gallery}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('gallery.destroy');
        Route::get('/divisi', [App\Http\Controllers\Admin\DivisiController::class, 'index'])->name('divisi');
        Route::get('/divisi/{divisi}/edit', [App\Http\Controllers\Admin\DivisiController::class, 'edit'])->name('divisi.edit');
        Route::post('/divisi/{divisi}', [App\Http\Controllers\Admin\DivisiController::class, 'update'])->name('divisi.update');
    });