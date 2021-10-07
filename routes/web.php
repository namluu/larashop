<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/authenticate', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create'])->name('menus.add');
            Route::get('/', [MenuController::class, 'show'])->name('menus.list');
        });
    });
});

