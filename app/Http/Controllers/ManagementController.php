<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
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
    public function home()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/home']);
        }
    }


     public function publications()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/publications']);
        }
    }


    public function questions()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/display']);
        }
    }


     public function registerQuestions()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/register']);
        }
    }
}
