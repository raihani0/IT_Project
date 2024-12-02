<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\HistoryController;
=======
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DesaController;
>>>>>>> d3ed055d14819802f0f8f3d9df3f1453893a0ed8


// Route untuk halaman awal
Route::get('/', function () {
    return view('welcome' );
});

// Route untuk autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login' );
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman utama dengan middleware auth
Route::get('/Home', function () {
    return view('Home');
})->middleware('auth');

// Route untuk Desa
Route::get('/Desa', function () {
    return view('Desa');
});


//Route untuk penduduk
Route::get("/penduduks", [PendudukController::class, 'index'])->name("penduduks.index");
Route::get("/penduduks/create", [PendudukController::class, 'create'])->name("penduduks.create");
Route::post("penduduks", [PendudukController::class, 'store'])->name("penduduks.store");
Route::get("penduduks/{id}/edit", [PendudukController::class, 'edit'])->name("penduduks.edit");
Route::put("penduduks/{id}", [PendudukController::class, 'update'])->name("penduduks.update");
Route::get("penduduks/{id}", [PendudukController::class, 'show'])->name("penduduks.show");
Route::delete("penduduks/{id}", [PendudukController::class, 'destroy'])->name("penduduks.destroy");

// Route untuk Dokumentasi
Route::get('/Dokumentasi', function () {
    return view('Dokumentasi');
});

// Route untuk Bantuan (Resource controller)
<<<<<<< HEAD
Route::get('/bantuan', [BantuanController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::resource('bantuans', BantuanController::class);
});

Route::get('/histori', [HistoryController::class, 'index'])->name('histori.index');
=======
Route::resource('/bantuans', \App\Http\Controllers\BantuanController::class);

>>>>>>> d3ed055d14819802f0f8f3d9df3f1453893a0ed8
