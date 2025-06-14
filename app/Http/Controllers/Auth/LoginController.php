<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('admin.index', ['page' => 'auth.login']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_email' => ['required', 'email'],
            'user_password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['user_email'], 'password' => $credentials['user_password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/home'); // ou sua rota pós-login
        }

        return back()->withErrors([
            'auth_error' => 'E-mail ou senha inválidos.',
            ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users/login');
    }
}
