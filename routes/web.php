<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PendudukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Home', function () {
    return view('Home');
});

// Route untuk posts
Route::get("posts", [PostController::class, 'index'])->name("posts.index");
Route::get("posts/create", [PostController::class, 'create'])->name("posts.create");
Route::post("posts/create", [PostController::class, 'store'])->name("posts.store");
Route::get("posts/{id}/edit", [PostController::class, 'edit'])->name("posts.edit");
Route::put("posts/{id}", [PostController::class, 'update'])->name("posts.update");
Route::get("posts/{id}", [PostController::class, 'show'])->name("posts.show");
Route::delete("posts/{id}", [PostController::class, 'destroy'])->name("posts.destroy");

// Route untuk penduduk
Route::get("penduduks", [PendudukController::class, 'index'])->name("penduduks.index");
Route::get("penduduks/create", [PendudukController::class, 'create'])->name("penduduks.create");
Route::post("penduduks", [PendudukController::class, 'store'])->name("penduduks.store");
Route::get("penduduks/{id}/edit", [PendudukController::class, 'edit'])->name("penduduks.edit");
Route::put("penduduks/{id}/edit", [PendudukController::class, 'update'])->name("penduduks.update");
Route::get("penduduks/{id}", [PendudukController::class, 'show'])->name("penduduks.show");
Route::delete("penduduks/{id}", [PendudukController::class, 'destroy'])->name("penduduks.destroy");
