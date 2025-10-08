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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $questions = \App\Models\Challenge::inRandomOrder()
            ->limit(10)
            ->get([
                'id',
                'statement',
                'source',
                'hint',
                'correct_alternative',
                'alternative_a',
                'alternative_b',
                'alternative_c',
                'alternative_d',
                'alternative_e',
                'attachment_01',
                'attachment_02',
                'attachment_03',
            ]);

        return view('admin.index', [
            'page' => 'challenge/display',
            'questions' => $questions,
        ]);
    }
}
