<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigAccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/users/login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        return view('admin.index', ['page' => 'config.config-account', 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/users/login')->with('error', 'Você precisa estar logado para atualizar suas informações.');
        }

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'cpf' => 'required|string',
            'phone' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'school' => 'required|string',
            'class' => 'required|string',
        ]);

        $user->update($data);

        return redirect()->route('config.account')->with('success', 'Informações atualizadas com sucesso.');
    }
}
