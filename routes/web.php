<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController as CategoryFrontendController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login/authenticate', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('{category}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('destroy', [CategoryController::class, 'destroy'])->name('categories.delete');
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

Route::get('category/{slug}', [CategoryFrontendController::class, 'show'])->name('category.show');
