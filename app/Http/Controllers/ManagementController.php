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

    public function messages()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/messages/display']);
        }
    }

    public function template()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/template/display']);
        }
    }

    public function statistics()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/statistics/graphics']);
        }
    }

    public function teams()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/teams/display']);
        }
    }

    public function questionsDisplay()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/display']);
        }
    }


    public function questionsRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/register']);
        }
    }

    public function questionsLevel()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/level']);
        }
    }

    public function questionsContent()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/content']);
        }
    }



}
