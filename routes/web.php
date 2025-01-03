<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\FonnteController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\DokumentasiController;


// Route untuk halaman awal
Route::get('/', function () {
    return view('homepage' );
});

Route::get('/homepage', function () {
    return view('homepage');
});

// Route untuk autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk login dengan Google
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Route untuk logout dari Google
Route::get('/logout-google', [AuthController::class, 'logoutGoogle'])->name('logout.google');

// Route untuk halaman utama dengan middleware auth
Route::get('/Home', function () {
    return view('Home');
})->middleware('auth');

//Route untuk penduduk
Route::resource('penduduk', PendudukController::class);
Route::get('pdf_generator', [PendudukController::class, 'pdf_generator_get']);

Route::controller(KriteriaController::class)->group(function() {
    Route::get('kriteria/', 'index');
    Route::get('kriteria/add', 'add');
    Route::post('kriteria/store', 'store');
    Route::get('kriteria/edit/{id}', 'edit');
    Route::post('kriteria/update/{id}', 'update');
    Route::get('kriteria/delete/{id}', 'delete');
});

Route::controller(AlternatifController::class)->group(function() {
    Route::get('alternatif/', 'index');
    Route::get('alternatif/add', 'add');
    Route::post('alternatif/store', 'store');
    Route::get('alternatif/edit/{id}', 'edit');
    Route::post('alternatif/update/{id}', 'update');
    Route::get('alternatif/delete/{id}', 'delete');
});

Route::get('/hitung', [HitungController::class, 'hitung'])->name('hitung');

Route::resource('desa', DesaController::class);

// Route untuk Dokumentasi
// Menampilkan daftar dokumentasi
Route::resource('dokumentasi', DokumentasiController::class);
Route::get('/Dokumentasi', function () {
    return view('Dokumentasi');
});

// Route untuk Bantuan (Resource controller)
Route::get('/bantuan', [BantuanController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::resource('bantuans', BantuanController::class);
});

Route::get('/histori', [HistoryController::class, 'index'])->name('histori.index');

// Rute untuk menampilkan form
Route::get('/send-message', [FonnteController::class, 'showForm']);

// Rute untuk memproses pengiriman pesan
Route::post('/send-message', [FonnteController::class, 'sendMessage']);

use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::middleware('auth')->get('/profile/view', [ProfileController::class, 'view'])->name('profile.view');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
