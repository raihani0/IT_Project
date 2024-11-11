<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/Login', function () {
    return view('Login');
});
Route::get('/Home', function () {
    return view('Home');
});
// Route untuk Bantuan
Route::resource('/bantuans', \App\Http\Controllers\BantuanController::class);

