<?php

use App\Http\Controllers\Management\GradesController;
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

// AUTHENTICATION ROUTES
    // Login
    Route::get('/users/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/users/login', [LoginController::class, 'login'])->name('login.submit');

    // Register
    Route::get('/users/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/users/register', [RegisterController::class, 'register'])->name('register.submit');

    // Logout
    Route::get('/users/logout', [LoginController::class, 'logout'])->name('logout');

    // Password Reset
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.token');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Google
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// ACCOUNT
    Route::get('/account', [ConfigAccountController::class, 'index'])->name('config.account');
    Route::post('/account', [ConfigAccountController::class, 'update'])->name('config.account.update');

// PAGES ROUTES
    // Redirect root to /home
    Route::get('/', function () {
        return redirect()->route('home');
    });

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Credits
    Route::get('/credits', [HomeController::class, 'credits'])->name('credits');

    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    // Study
    Route::get('/study', [StudyController::class, 'index'])->name('study');

    // Game
    Route::get('/game/menu', [GameController::class, 'menu'])->name('game.menu');
    Route::get('/game/new', [GameController::class, 'new'])->name('game.new');
    Route::get('/game/display', [GameController::class, 'display'])->name('game.display');
    Route::get('/game/students-ranking', [GameController::class, 'studentsRanking'])->name('game.students-ranking');
    Route::get('/game/questions-by-grade', [GameController::class, 'questionsByGrade'])->name('game.questions-by-grade');
    Route::post('/game/save-ranking', [GameController::class, 'saveRanking'])->name('game.save-ranking');

// MANAGEMENT
    // Home
    Route::get('/management/home', [ManagementController::class, 'home'])->name('management.home');

    // Publications
    Route::get('/management/publications', [ManagementController::class, 'publications'])->name('management.publications');

    // Schools
        // show
        Route::get('/management/schools', [SchoolController::class, 'schools'])->name('management.schools');

        // register
        Route::get('/management/schools/register', [SchoolController::class, 'register'])->name('management.schools.register');
        Route::post('/management/schools/register', [SchoolController::class, 'store'])->name('management.schools.store');

        // edit, update, remove
        Route::delete('/management/schools/remove/{id}', [SchoolController::class, 'remove'])->name('management.schools.remove');
        Route::get('/management/schools/edit/{id}', [SchoolController::class, 'edit'])->name('management.schools.edit');
        Route::put('/management/schools/update/{id}', [SchoolController::class, 'update'])->name('management.schools.update');

    // Messages
    Route::get('/management/messages', [ManagementController::class, 'messages'])->name('management.messages');

    // Statistics
    Route::get('/management/statistics', [ManagementController::class, 'statistics'])->name('management.statistics');

    // Questions
        // show
        Route::get('/management/questions', [ManagementController::class, 'questions'])->name('management.questions');

        // register
        Route::get('/management/questions/register', [ManagementController::class, 'questionsRegister'])->name('management.questionsRegister');
        Route::post('/management/questions/register', [ManagementController::class, 'questionsStore'])->name('management.questions.store');

        // edit
        Route::get('/management/questions/edit/{id}', [ManagementController::class, 'questionsEdit'])->name('management.questions.edit');
        Route::put('/management/questions/update/{id}', [ManagementController::class, 'questionsUpdate'])->name('management.questions.update');

        // remove
        Route::delete('/management/questions/remove/{id}', [ManagementController::class, 'questionsRemove'])->name('management.questions.remove');

        // view one only
        Route::get('/management/questions/view/{id}', [ManagementController::class, 'questionsView'])->name('management.questions.view');

        // view one statistics only
        Route::get('/management/questions/statistics/{id}', [ManagementController::class, 'questionsStatistics'])->name('management.questions.statistics');

    // Grade
        // show
        Route::get('/management/grades', [GradesController::class, 'grades'])->name('management.grades');

        // register
        Route::get('/management/grades/register', [GradesController::class, 'register'])->name('management.grades.register');
        Route::post('/management/grades/register', [GradesController::class, 'store'])->name('management.grades.store');

        // edit
        Route::get('/management/grades/edit/{id}', [GradesController::class, 'edit'])->name('management.grades.edit');
        Route::put('/management/grades/update/{id}', [GradesController::class, 'update'])->name('management.grades.update');

        // remove
        Route::delete('/management/grades/remove/{id}', [GradesController::class, 'remove'])->name('management.grades.remove');

    // Content
        // show
        Route::get('/management/contents', [ManagementController::class, 'contents'])->name('management.contents');

        // register
        Route::get('/management/contents/register', [ManagementController::class, 'contentsRegister'])->name('management.contents.register');
        Route::post('/management/contents/register', [ManagementController::class, 'contentsStore'])->name('management.contents.store');

        // edit
        Route::get('/management/contents/edit/{id}', [ManagementController::class, 'contentsEdit'])->name('management.contents.edit');
        Route::put('/management/contents/update/{id}', [ManagementController::class, 'contentsUpdate'])->name('management.contents.update');

        // remove
        Route::delete('/management/contents/remove/{id}', [ManagementController::class, 'contentsRemove'])->name('management.contents.remove');

    // Template
        // show
        Route::get('/management/template', [ManagementController::class, 'template'])->name('management.template');

        // register
        Route::get('/management/template/register', [ManagementController::class, 'templateRegister'])->name('management.template.register');
        Route::post('/management/template/register', [ManagementController::class, 'templateStore'])->name('management.template.store');

        // edit
        Route::get('/management/template/edit/{id}', [ManagementController::class, 'templateEdit'])->name('management.template.edit');
        Route::put('/management/template/update/{id}', [ManagementController::class, 'templateUpdate'])->name('management.template.update');

        // remove
        Route::delete('/management/template/remove/{id}', [ManagementController::class, 'templateRemove'])->name('management.template.remove');

    // Users
        // show
        Route::get('/management/users',  [ManagementController::class, 'users'])->name('management.users');

        // edit
        Route::get('/management/users/edit/{id}', [ManagementController::class, 'usersEdit'])->name('management.users.edit');
        Route::put('/management/users/update/{id}', [ManagementController::class, 'usersUpdate'])->name('management.users.update');

        // remove
        Route::delete('/management/users/remove/{id}', [ManagementController::class, 'usersRemove'])->name('management.users.remove');

    // Challenge
        // show
        Route::get('/management/challenge', [ManagementController::class, 'challenge'])->name('management.challenge');

        // register
        Route::get('/management/challenge/register', [ManagementController::class, 'challengeRegister'])->name('management.challenge.register');
        Route::post('/management/challenge/register', [ManagementController::class, 'challengeStore'])->name('management.challenge.store');

        // edit
        Route::get('/management/challenge/edit/{id}', [ManagementController::class, 'challengeEdit'])->name('management.challenge.edit');
        Route::put('/management/challenge/update/{id}', [ManagementController::class, 'challengeUpdate'])->name('management.challenge.update');

        // remove
        Route::delete('/management/challenge/remove/{id}', [ManagementController::class, 'challengeRemove'])->name('management.challenge.remove');

        // questions in a challenge
            // show
            Route::get('/management/challenge/{id}/questions', [ManagementController::class, 'challengeQuestions'])->name('management.challenge.questions');

            // add question to challenge
            Route::get('/management/challenge/{id}/questions/add', [ManagementController::class, 'challengeQuestionsAdd'])->name('management.challenge.questions.add');
            Route::post('/management/challenge/{id}/questions/add', [ManagementController::class, 'challengeQuestionsStore'])->name('management.challenge.questions.store');

            // remove question from challenge
            Route::delete('/management/challenge/{challenge_id}/questions/remove/{question_id}', [ManagementController::class, 'challengeQuestionsRemove'])->name('management.challenge.questions.remove');

