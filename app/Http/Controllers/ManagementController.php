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
        return redirect()->route('login');
    }


     public function publications()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/publications']);
        }
    }


    public function questions(Request $request)
    {
        if (Auth::check()) {
            $limit = $request->get('limit', 10);
            if ($limit === 'all') {
                $questions = \App\Models\Question::all();
            } else {
                $questions = \App\Models\Question::orderByDesc('id')->limit((int)$limit)->get();
            }
            return view('management.admin.index', [
                'page' => 'management/questions/display',
                'questions' => $questions
            ]);
        }
    }


     public function questionsRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/register']);
        }
    }

    public function questionsStore(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be authenticated.');
        }

        $validated = $request->validate([
            'grade' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'tip' => 'required|string',
            'statement' => 'required|string',
            'correct_option' => 'required|string|in:a,b,c,d,e',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            // attachments are optional
        ]);

        \App\Models\Question::saveFromRequest($validated, $request->allFiles());

        return redirect()->route('management.questionsRegister')->with('success', 'Question registered successfully!');
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
}
