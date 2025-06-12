<?php

use App\Http\Controllers\UserAuth;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// USER
Route::get('/users', [UserAuth::class, 'index']);

Route::get('/users/register', [UserAuth::class, 'register']);
Route::post('/users/register', [UserAuth::class, 'store'])->name('register.store');

Route::get('/users/get-user-data', [UserAuth::class, 'getUserData']);

Route::get('/users/login', [UserAuth::class, 'login']);
Route::post('/users/login', [UserAuth::class, 'login_validation'])->name('login.login_validation');

Route::get('/users/forgot_password', [UserAuth::class, 'forgot_password']);
Route::post('/users/forgot_password', [UserAuth::class, 'forgot_password_validation'])->name('forgot_password.forgot_password_validation');

Route::get('/users/logout', [UserAuth::class, 'logout'])->name('logout');

// HOME
Route::get('/home', [Home::class, 'index']);