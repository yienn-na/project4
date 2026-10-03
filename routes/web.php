<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;

// Route Login
Route::get('/', [logincontroller::class, 'index']);
Route::post('/login', [logincontroller::class, 'aksilogin']);

// Route Home & Logout
Route::get('/home', [logincontroller::class, 'home']);
Route::get('/logout', [logincontroller::class, 'logout']);

// Route Form Register/Input (GET) & Simpan Data (POST)
Route::get('/girasya', [logincontroller::class, 'tampil']);
Route::post('/girasya', [logincontroller::class, 'zano']); 