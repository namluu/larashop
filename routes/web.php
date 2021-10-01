<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users/login', [LoginController::class, 'index']);
Route::post('admin/users/login/authenticate', [LoginController::class, 'authenticate']);
Route::get('admin/dashboard', [DashboardController::class, 'index']);
