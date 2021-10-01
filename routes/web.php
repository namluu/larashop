<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users/login', [LoginController::class, 'index']);
