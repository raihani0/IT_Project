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