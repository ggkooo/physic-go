<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ValidationUserRequest;


class UserAuth extends Controller
{
    public function index(): View
    {
        return view('auth');
    }

    // public function store(Request $request): JsonResponse
    // {
    //     $validated = $request->validate([
    //         'user_name' => 'required|string',
    //         'email' => 'required|email|unique:users',
    //         'user_password' => 'required|min:6',
    //         'user_confirm_password' => 'required|same:user_password'
    //     ]);

    //     $user = User::createUser($validated);

    //     return response()->json($user, 201);
    // }

    public function store(ValidationUserRequest $request)
    {
        $validated = $request->validated();

        User::createUser($validated);

        return redirect('/users/login')->with('success', 'Usuário registrado com sucesso!');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

}
