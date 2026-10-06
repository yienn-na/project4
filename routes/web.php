<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'aksilogin']);

Route::get('/register', [LoginController::class, 'data']);
Route::post('/register', [LoginController::class, 'zano']);

Route::get('/home', [LoginController::class, 'home']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/tampil', [LoginController::class, 'tampil']);

Route::get('/edit/{id}', [LoginController::class, 'edit']);
Route::put('/update/{id}', [LoginController::class, 'update']);
Route::delete('/hapus/{id}', [LoginController::class, 'hapus']);