<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakulikulerController;

// LOGIN DAN LOGOUT
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// HALAMAN LANDING
Route::get('/', [LandingController::class, 'index'])->name('landing.home');
Route::get('/profil', [LandingController::class, 'profil'])->name('landing.profil');
Route::get('/guru', [LandingController::class, 'guru'])->name('landing.guru');
Route::get('/semua-guru', [LandingController::class, 'semuaGuru'])->name('landing.semua-guru');
Route::get('/berita', [LandingController::class, 'berita'])->name('landing.berita');
Route::get('/galeri', [LandingController::class, 'galeri'])->name('landing.galeri');
Route::get('/ekstrakulikuler', [LandingController::class, 'ekstrakulikuler'])->name('landing.ekstrakulikuler');

// PROFIL SEKOLAH PUBLIK
Route::get('/profil-publik', [ProfilSekolahController::class, 'publicIndex'])
    ->name('profil-publik.index');

// DETAIL LANDING
Route::get('/guru/landing-detail/{nama}', [GuruController::class, 'landingDetail'])->name('guru.landing-detail');
Route::get('/berita/landing-detail/{judul}', [BeritaController::class, 'landingDetail'])->name('berita.landing-detail');
Route::post('/galeri/detail', [GaleriController::class, 'landingDetail'])->name('galeri.landing-detail');
Route::get('/ekstrakulikuler/detail/{nama}', [EkstrakulikulerController::class, 'landingDetail'])->name('ekstrakulikuler.landing-detail');

// ============= PROFIL SAYA (TANPA LOGIN) =============
Route::get('/profil-saya', [UserController::class, 'profilSaya'])->name('profil-saya');
Route::get('/profil-saya/edit', [UserController::class, 'editProfilSaya'])->name('profil-saya.edit');
Route::post('/profil-saya/update', [UserController::class, 'updateProfilSaya'])->name('profil-saya.update');

// DASHBOARD - LOGIN REQUIRED
Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ============= DATA SISWA =============
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa/detail', [SiswaController::class, 'show'])->name('siswa.detail');

    Route::middleware('admin')->group(function () {
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::post('/siswa/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::post('/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
        Route::post('/siswa/delete', [SiswaController::class, 'destroy'])->name('siswa.delete');
    });

    // ============= PROFIL SEKOLAH =============
    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profil-sekolah.index');

    Route::middleware('admin')->group(function () {
        Route::get('/profil-sekolah/create', [ProfilSekolahController::class, 'create'])->name('profil-sekolah.create');
        Route::post('/profil-sekolah/store', [ProfilSekolahController::class, 'store'])->name('profil-sekolah.store');
        Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])->name('profil-sekolah.edit');
        Route::put('/profil-sekolah/update', [ProfilSekolahController::class, 'update'])->name('profil-sekolah.update');
        Route::delete('/profil-sekolah/delete', [ProfilSekolahController::class, 'destroy'])->name('profil-sekolah.delete');
    });

    // ============= DATA GURU =============
    Route::get('/dashboard/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru/detail', [GuruController::class, 'show'])->name('guru.detail');

    Route::middleware('admin')->group(function () {
        Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
        Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
        Route::post('/guru/edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::post('/guru/update', [GuruController::class, 'update'])->name('guru.update');
        Route::post('/guru/delete', [GuruController::class, 'destroy'])->name('guru.delete');
    });

    // ============= DATA GALERI =============
    Route::get('/dashboard/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::post('/galeri/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::post('/galeri/update', [GaleriController::class, 'update'])->name('galeri.update');
    Route::post('/galeri/delete', [GaleriController::class, 'destroy'])->name('galeri.delete');
    Route::match(['get', 'post'], '/galeri/dashboard-detail', [GaleriController::class, 'show'])->name('galeri.detail');

    // ============= DATA BERITA =============
    Route::get('/dashboard/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita/detail', [BeritaController::class, 'show'])->name('berita.detail');

    Route::middleware('admin')->group(function () {
        Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
        Route::post('/berita/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::post('/berita/update', [BeritaController::class, 'update'])->name('berita.update');
        Route::post('/berita/delete', [BeritaController::class, 'destroy'])->name('berita.delete');
    });

    // ============= DATA EKSTRAKURIKULER =============
    Route::get('/dashboard/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index');
    Route::post('/ekstrakulikuler/dashboard-detail', [EkstrakulikulerController::class, 'show'])->name('ekstrakulikuler.detail');

    Route::middleware('admin')->group(function () {
        Route::get('/ekstrakulikuler/create', [EkstrakulikulerController::class, 'create'])->name('ekstrakulikuler.create');
        Route::post('/ekstrakulikuler/store', [EkstrakulikulerController::class, 'store'])->name('ekstrakulikuler.store');
        Route::post('/ekstrakulikuler/edit', [EkstrakulikulerController::class, 'edit'])->name('ekstrakulikuler.edit');
        Route::post('/ekstrakulikuler/update', [EkstrakulikulerController::class, 'update'])->name('ekstrakulikuler.update');
        Route::post('/ekstrakulikuler/delete', [EkstrakulikulerController::class, 'destroy'])->name('ekstrakulikuler.delete');
    });

    // ============= MANAGEMENT USER =============
    Route::middleware('admin')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::post('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.delete');
    });

});