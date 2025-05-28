<?php

use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// USER
Route::get('/users', [UserAuth::class, 'index']);
Route::post('/users/register', [UserAuth::class, 'store']);
Route::get('/users/get-user-data', [UserAuth::class, 'getUserData']);
Route::get('/users/login', [UserAuth::class, 'login']);
Route::get('/users/register', [UserAuth::class, 'register']);


