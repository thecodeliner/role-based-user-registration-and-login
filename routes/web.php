<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');

Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');

Route::post('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

route::get('/student', [StudentController::class, 'index'])->middleware('auth')->name('student.index');
route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth')->name('teacher.index');
