<?php

namespace App\Http\Controllers;

use App\Http\Requests\Management\CreateSchoolRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;

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


     public function questionsRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/register']);
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

    public function users()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/users/display']);
        }
    }
    
    public function usersRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/users/register']);
        }
    }

    public function teams()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/teams/display']);
        }
    }
}
