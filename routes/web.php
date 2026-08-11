<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kelascontroller;
use App\Http\Controllers\authorcontroller;
use App\Http\Controllers\bukucontroller;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\siswacontroller;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\author;
use App\Models\kategori;
use App\Models\buku;

// Halaman awal ("welcome") diganti menjadi halaman login.
// Kalau sudah login, langsung diarahkan ke dashboard.
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalKelas' => kelas::count(),
        'totalSiswa' => siswa::count(),
        'totalAuthor' => author::count(),
        'totalKategori' => kategori::count(),
        'totalBuku' => buku::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Semua modul CRUD wajib login dulu
    Route::resource('kelas', kelascontroller::class);
    Route::resource('author', authorcontroller::class);
    Route::resource('buku', bukucontroller::class);
    Route::resource('kategori', kategoricontroller::class);
    Route::resource('siswa', siswacontroller::class);
});

require __DIR__.'/auth.php';
