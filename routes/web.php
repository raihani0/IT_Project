<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Home', function () {
    return view('Home');
})->middleware('auth');

// Route untuk Bantuan
Route::resource('/bantuans', \App\Http\Controllers\BantuanController::class);

Route::get('/Desa', function () {
    return view('Desa');
});

Route::get('/Dokumentasi', function () {
    return view('Dokumentasi');
});