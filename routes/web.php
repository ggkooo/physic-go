<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Config\ConfigAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\Management\SchoolController;
use App\Http\Controllers\Management\UserController;

// USER
Route::get('/users/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/users/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/users/logout', [LoginController::class, 'logout'])->name('logout');

// Registro
Route::get('/users/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/users/register', [RegisterController::class, 'register'])->name('register.perform');

// Esqueci a senha
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// GOOGLE AUTH
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// HOME
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/credits', [HomeController::class, 'credits']);

// CONFIG ACCOUNT
Route::get('/account', [ConfigAccountController::class, 'index'])->name('config.account');
Route::post('/account', [ConfigAccountController::class, 'update'])->name('config.account.update');

// CONTACT
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// STUDY
Route::get('/study', [StudyController::class, 'index'])->name('study');

// GAME
Route::get('/game/menu', [GameController::class, 'menu']);
Route::get('/game/new', [GameController::class, 'new']);
Route::get('/game/display', [GameController::class, 'display']);
Route::get('/game/students_ranking', [GameController::class, 'students_ranking']);
Route::get('/game/questions-by-serie', [GameController::class, 'questionsBySerie'])->name('game.questionsBySerie');
Route::post('/game/save-ranking', [GameController::class, 'saveRanking'])->name('game.saveRanking');

// MANAGEMENT
// home
Route::get('/management/home', [ManagementController::class, 'home']);

// publications
Route::get('/management/publications', [ManagementController::class, 'publications']);

// questions
Route::get('/management/questionsDisplay', [ManagementController::class, 'questionsDisplay']);
Route::get('/management/questionsRegister', [ManagementController::class, 'questionsRegister'])->name('questions.register');

// schools
Route::get('/management/schools', [SchoolController::class, 'schools'])->name('management.schools');
Route::get('/management/schoolsRegister', [SchoolController::class, 'schoolsRegister'])->name('management.schools.register');
Route::post('/management/schoolsRegister', [SchoolController::class, 'schoolsStore'])->name('management.schools.store');
Route::delete('/management/schools/remove/{id}', [SchoolController::class, 'removeSchool'])->name('management.schools.remove');
Route::get('/management/schools/edit/{id}', [SchoolController::class, 'editSchool'])->name('management.schools.edit');
Route::put('/management/schools/update/{id}', [SchoolController::class, 'updateSchool'])->name('management.schools.update');

// messages
Route::get('/management/messages', [ManagementController::class, 'messages']);

// template
Route::get('/management/template', [ManagementController::class, 'template']);

// statistics
Route::get('/management/statistics', [ManagementController::class, 'statistics']);

// question/level
Route::get('/management/questionsLevel', [ManagementController::class, 'questionsLevel']);
Route::get('/management/questionsContent', [ManagementController::class, 'questionsContent']);

// USERS
Route::get('/management/users', [UserController::class, 'users'])->name('management.users');
Route::get('/management/users/edit/{id}', [UserController::class, 'editUser'])->name('management.users.edit');
Route::put('/management/users/update/{id}', [UserController::class, 'updateUser'])->name('management.users.update');
Route::delete('/management/users/remove/{id}', [UserController::class, 'removeUser'])->name('management.users.remove');

