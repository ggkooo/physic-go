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
}
