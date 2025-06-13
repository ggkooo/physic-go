<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use App\Http\Requests\ValidationUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPasswordRequest;


class UserAuth extends Controller
{
    public function index(): View
    {
        return view('auth');
    }


    public function register()
    {
        return view('admin.index', ['page' => 'auth.register']);
    }

    public function store(ValidationUserRequest $request)
    {
        $validated = $request->validated();

        User::createUser($validated);

        return redirect('/users/login')->with('success', 'Usuário registrado com sucesso!');
    }

    public function login()
    {
        return view('admin.index', ['page' => 'auth.login']);
    }

    public function login_validation(LoginRequest $request)
    {
        $validated = $request->validated();

        Cookie::queue('logged_in', 'valor', 20160);
        return redirect('/')->with('success', 'Sessão iniciada com sucesso!');
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('logged_in'));
        return redirect('/users/login')->with('success', 'Sessão encerrada com sucesso!');
    }

    public function forgot_password()
    {
        return view('admin.index', ['page' => 'auth.forgot_password']);
    }

    public function forgot_password_validation(ForgotPasswordRequest $request)
    {
        $validated = $request->validated();

        return redirect('/users/login')->with('success', 'Alterações salvas com sucesso!');
    }

}
