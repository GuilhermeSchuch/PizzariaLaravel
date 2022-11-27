<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// HOME
Route::get('/', [HomeController::class, "index"])->name('home');
Route::post('/pedido', [HomeController::class, "store"])->name('storePedido');

// AUTH
Route::get('/login', [AuthController::class, "index"])->name('login');
Route::post('/auth', [AuthController::class, "auth"])->name('auth.auth');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
