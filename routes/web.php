<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Home', function () {
    return view('Home');
});
Route::get('/Desa', function () {
    return view('Desa');
});