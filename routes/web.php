<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('auth.login'); // Asegúrate de que la vista esté en resources/views/auth/login.blade.php
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard'); // Asegúrate de que exista "resources/views/dashboard.blade.php"
})->name('dashboard');