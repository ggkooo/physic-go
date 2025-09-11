<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use Illuminate\Pagination\Paginator;

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

    public function grades()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/grades/display']);
        }
    }

    public function contents()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/contents/display']);
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

    public function questions(Request $request)
    {
        if (Auth::check()) {
            $limit = $request->get('limit', 5);
            $questions = \App\Models\Question::orderBy('id')->paginate($limit);
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

        return redirect()->route('management.questions')->with('success', 'Pergunta registrada com sucesso!');
    }

    public function questionsEdit($id)
    {
        if (Auth::check()) {
            $question = \App\Models\Question::findOrFail($id);
            return view('management.admin.index', [
                'page' => 'management/questions/register',
                'editQuestion' => $question
            ]);
        }
        return redirect()->route('login');
    }

    public function questionsUpdate(Request $request, $id)
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
        $question = \App\Models\Question::findOrFail($id);
        $fieldsWithFiles = [
            'tip_attachment',
            'statement_attachment1',
            'statement_attachment2',
            'statement_attachment3',
            'option_a_attachment',
            'option_b_attachment',
            'option_c_attachment',
            'option_d_attachment',
            'option_e_attachment',
        ];
        foreach ($fieldsWithFiles as $field) {
            if ($request->hasFile($field) && $request->file($field)->isValid()) {
                $validated[$field] = $request->file($field)->store('questions/attachments', 'public');
            }
        }
        $question->update($validated);
        return redirect()->route('management.questions.edit', $question->id)->with('success', 'Pergunta atualizada com sucesso!');
    }

    public function questionsView($id)
    {
        if (Auth::check()) {
            $question = \App\Models\Question::findOrFail($id);
            return view('management.admin.index', [
                'page' => 'management/questions/view',
                'question' => $question
            ]);
        }
        return redirect()->route('login');
    }

    public function questionsStatistics($id)
    {
        if (Auth::check()) {
            $question = \App\Models\Question::findOrFail($id);
            return view('management.admin.index', [
                'page' => 'management/questions/statistics',
                'question' => $question
            ]);
        }
        return redirect()->route('login');
    }

    public function challenge()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/challenge/display']);
        }
    }

    public function challengeRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/challenge/register']);
        }
    }

    public function users()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/users/display']);
        }
    }

}
