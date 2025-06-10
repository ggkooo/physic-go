<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\View\View;

class Home extends Controller
{
    public function index()
    {
        return view('admin.index', ['page' => 'home.exibir']);
    }
}
