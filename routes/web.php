<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login/authenticate', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::prefix('menus')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('menus.index');
            Route::get('create', [MenuController::class, 'create'])->name('menus.create');
            Route::post('/', [MenuController::class, 'store'])->name('menus.store');
            Route::get('{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
            Route::delete('destroy', [MenuController::class, 'destroy'])->name('menus.delete');
        });
    });
});

