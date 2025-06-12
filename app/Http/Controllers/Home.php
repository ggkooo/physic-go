<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\View\View;

class Home extends Controller
{
    public function index()
    {
        if (!isset($_COOKIE['logged_in'])) {
            return redirect('/users/login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }
        
        return view('admin.index', ['page' => 'home.exibir']);
    }
}
