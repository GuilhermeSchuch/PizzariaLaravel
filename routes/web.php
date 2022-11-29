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
// Route::get('/dashboard', [DashboardController::class, "getById"])->name('dashboard.getById');
Route::delete('/dashboard/{id}', [DashboardController::class, "destroy"])->name('dashboard.destroy');

// CHARTS
Route::get('/charts', [ChartController::class, "index"])->name('charts');

// MANAGE
Route::get('/manage', [ManageController::class, "index"])->name('manage');
Route::post('/manage/add/massa', [ManageController::class, "storeMassa"])->name('storeMassa');
Route::delete('/manage/massa/{name}', [ManageController::class, "destroyMassa"])->name('massa.destroy');
Route::put('/manage/update/massa/{name}', [ManageController::class, "updateMassa"])->name('massa.update');

Route::post('/manage/add/borda', [ManageController::class, "storeBorda"])->name('storeBorda');
Route::delete('/manage/borda/{name}', [ManageController::class, "destroyBorda"])->name('borda.destroy');
Route::put('/manage/update/borda/{name}', [ManageController::class, "updateBorda"])->name('borda.update');

Route::post('/manage/add/sabor', [ManageController::class, "storeSabor"])->name('storeSabor');
Route::delete('/manage/sabor/{name}', [ManageController::class, "destroySabor"])->name('sabor.destroy');
Route::put('/manage/update/sabor/{name}', [ManageController::class, "updateSabor"])->name('sabor.update');