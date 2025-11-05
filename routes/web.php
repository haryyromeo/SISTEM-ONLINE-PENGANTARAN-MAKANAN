<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenyuplaiMakananController;
use App\Http\Controllers\MengaturHargaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menyuplai-makanan', [MenyuplaiMakananController::class, 'index'])->name('menyuplai.index');
Route::post('/menyuplai-makanan', [MenyuplaiMakananController::class, 'store'])->name('menyuplai.store');

Route::get('/mengaturharga', [MengaturHargaController::class, 'index'])->name('mengaturharga.index');
Route::get('/mengaturharga/{id}/edit', [MengaturHargaController::class, 'edit'])->name('mengaturharga.edit');
Route::put('/mengaturharga/{id}', [MengaturHargaController::class, 'update'])->name('mengaturharga.update');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


