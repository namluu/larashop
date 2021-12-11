<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

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
            Route::get('{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
            Route::put('{menu}', [MenuController::class, 'update'])->name('menus.update');
            Route::delete('destroy', [MenuController::class, 'destroy'])->name('menus.delete');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/', [ProductController::class, 'store'])->name('products.store');
            Route::get('{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('{product}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('destroy', [ProductController::class, 'destroy'])->name('products.delete');
        });

        Route::post('upload/image', [UploadController::class, 'store'])->name('upload.image');
    });
});

