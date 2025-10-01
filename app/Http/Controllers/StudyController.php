<?php

namespace App\Http\Controllers;

class StudyController extends Controller
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
    public function index()
    {
        return view('admin.index', ['page' => 'study/display']);
    }

    public function elementary_school()
    {
        return view('admin.index', ['page' => 'study/elementary_school/elementary_school']);
    }

    public function sixth()
    {
        return view('admin.index', ['page' => 'study/elementary_school/sixth']);
    }

    public function seventh()
    {
        return view('admin.index', ['page' => 'study/elementary_school/seventh']);
    }

    public function eighth()
    {
        return view('admin.index', ['page' => 'study/elementary_school/eighth']);
    }

    public function ninth()
    {
        return view('admin.index', ['page' => 'study/elementary_school/ninth']);
    }


    public function ninth_qualification()
    {
        return view('admin.index', ['page' => 'study/ninth_qualification/ninth_qualification']);
    }

    public function high_school()
    {
        return view('admin.index', ['page' => 'study/high_school/high_school']);
    }

    public function first()
    {
        return view('admin.index', ['page' => 'study/high_school/first']);
    }

    public function second()
    {
        return view('admin.index', ['page' => 'study/high_school/second']);
    }

    public function third()
    {
        return view('admin.index', ['page' => 'study/high_school/third']);
    }
}
