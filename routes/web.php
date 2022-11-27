<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ManageController;

// HOME
Route::get('/', [HomeController::class, "index"])->name('home');
Route::post('/pedido', [HomeController::class, "store"])->name('storePedido');

// AUTH
Route::get('/login', [AuthController::class, "index"])->name('login');
Route::post('/auth', [AuthController::class, "auth"])->name('auth.auth');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
Route::delete('/dashboard/{id}', [DashboardController::class, "destroy"])->name('dashboard.destroy');

// CHARTS
Route::get('/charts', [ChartController::class, "index"])->name('charts');

// MANAGE
Route::get('/manage', [ManageController::class, "index"])->name('manage');