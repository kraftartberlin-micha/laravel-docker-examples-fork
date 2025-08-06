<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'login'])->name('login');

