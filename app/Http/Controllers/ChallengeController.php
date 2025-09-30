<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
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
     public function display()
    {
        if (Auth::check()) {
            return view('admin.index', ['page' => 'challenge/display']);
        }
    }
}
