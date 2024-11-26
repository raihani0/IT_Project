<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route untuk halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Route untuk autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
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

// Route untuk Dokumentasi
Route::get('/Dokumentasi', function () {
    return view('Dokumentasi');
});

// Route untuk Bantuan (Resource controller)
Route::resource('/bantuans', \App\Http\Controllers\BantuanController::class);
