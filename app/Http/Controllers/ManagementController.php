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
        return redirect()->route('login');
    }

    public function contents()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/contents/display']);
        }
        return redirect()->route('login');
    }

    public function messages()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/messages/display']);
        }
        return redirect()->route('login');
    }

    public function template()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/template/display']);
        }
        return redirect()->route('login');
    }

    public function statistics()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/statistics/graphics']);
        }
        return redirect()->route('login');
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
        return redirect()->route('login');
    }

    public function questionsRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/questions/register']);
        }
        return redirect()->route('login');
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

    public function challenge(Request $request)
    {
        if (Auth::check()) {
            $limit = $request->get('limit', 5);
            if ($limit === 'all') {
                $challenges = \App\Models\Challenge::orderBy('id', 'desc')->get();
            } else {
                $challenges = \App\Models\Challenge::orderBy('id', 'desc')->paginate((int)$limit);
            }
            return view('management.admin.index', [
                'page' => 'management/challenge/display',
                'challenges' => $challenges
            ]);
        }
        return redirect()->route('login');
    }

    public function challengeRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/challenge/register']);
        }
        return redirect()->route('login');
    }

// PHP
    public function challengeStore(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be authenticated.');
        }

        $validated = $request->validate([
            'statement' => 'required|string',
            'hint' => 'required|string',
            'source' => 'required|string',
            'correct_alternative' => 'required|string|in:a,b,c,d,e',
            'alternative_a' => 'nullable|string',
            'alternative_b' => 'nullable|string',
            'alternative_c' => 'nullable|string',
            'alternative_d' => 'nullable|string',
            'alternative_e' => 'nullable|string',
            'attachment_01' => 'nullable|file',
            'attachment_02' => 'nullable|file',
            'attachment_03' => 'nullable|file',
        ]);

        foreach (['attachment_01', 'attachment_02', 'attachment_03'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('challenges/attachments', 'public');
            }
        }

        \App\Models\Challenge::create($validated);

        return redirect()->route('management.challenge')->with('success', 'Desafio salvo com sucesso!');
    }

    public function challengeEdit($id)
    {
        if (Auth::check()) {
            $challenge = \App\Models\Challenge::findOrFail($id);
            return view('management.admin.index', [
                'page' => 'management/challenge/register',
                'editChallenge' => $challenge
            ]);
        }
        return redirect()->route('login');
    }

    public function challengeUpdate(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be authenticated.');
        }
        $validated = $request->validate([
            'statement' => 'required|string',
            'hint' => 'required|string',
            'source' => 'required|string',
            'correct_alternative' => 'required|string|in:a,b,c,d,e',
            'alternative_a' => 'nullable|string',
            'alternative_b' => 'nullable|string',
            'alternative_c' => 'nullable|string',
            'alternative_d' => 'nullable|string',
            'alternative_e' => 'nullable|string',
            'attachment_01' => 'nullable|file',
            'attachment_02' => 'nullable|file',
            'attachment_03' => 'nullable|file',
        ]);
        $challenge = \App\Models\Challenge::findOrFail($id);
        foreach (['attachment_01', 'attachment_02', 'attachment_03'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('challenges/attachments', 'public');
            }
        }
        $challenge->update($validated);
        return redirect()->route('management.challenge', $challenge->id)->with('success', 'Desafio atualizado com sucesso!');
    }

    public function users()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/users/display']);
        }
        return redirect()->route('login');
    }

}
