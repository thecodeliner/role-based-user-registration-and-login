<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');

Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');

Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

