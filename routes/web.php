<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< Updated upstream
Route::get('/Home', function () {
    return view('Home');
});
Route::get('/Desa', function () {
    return view('Desa');
});
=======
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Home', function () {
    return view('Home');
})->middleware('auth');

>>>>>>> Stashed changes
