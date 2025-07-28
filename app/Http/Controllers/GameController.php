<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function menu()
    {
        return view('admin.index', ['page' => 'game/menu']);
    }

    public function new()
    {
        return view('admin.index', ['page' => 'game/new_game']);
    }

    public function display()
    {
        return view('admin.index', ['page' => 'game/display']);
    }
}


