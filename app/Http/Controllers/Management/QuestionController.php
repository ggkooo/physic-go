<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\QuestionRequest;
use App\Models\Grade;
use App\Models\Question;
use App\Services\QuestionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        acesso('management', 1);

        $limit = $request->input('limit', 5);

        if ($limit === 'all') {
            $questions = Question::orderByDesc('id')->get();
        } else {
            $questions = Question::orderByDesc('id')->paginate(max((int) $limit, 1));
        }

        return view('management.admin.index', [
            'page' => 'management/questions/display',
            'questions' => $questions,
        ]);
    }

    public function create(): View
    {
        acesso('management', 1);

        return view('management.admin.index', [
            'page' => 'management/questions/register',
            'grades' => Grade::where('status', 'active')->orderBy('name')->get(),
        ]);
    }

    public function store(QuestionRequest $request, QuestionService $service): RedirectResponse
    {
        acesso('management', 1);

        $service->create($request->validated(), $request);

        return redirect()
            ->route('management.questions')
            ->with('success', 'Pergunta registrada com sucesso!');
    }

    public function edit(int $id): View
    {
        acesso('management', 1);

        return view('management.admin.index', [
            'page' => 'management/questions/register',
            'editQuestion' => Question::findOrFail($id),
            'grades' => Grade::where('status', 'active')->orderBy('name')->get(),
        ]);
    }

    public function update(QuestionRequest $request, int $id, QuestionService $service): RedirectResponse
    {
        acesso('management', 1);

        $question = Question::findOrFail($id);
        $service->update($question, $request->validated(), $request);

        return redirect()
            ->route('management.questions.edit', $question->id)
            ->with('success', 'Pergunta atualizada com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        acesso('management', 1);

        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()
            ->route('management.questions')
            ->with('success', 'Pergunta removida com sucesso!');
    }

    public function show(int $id): View
    {
        acesso('management', 1);

        return view('management.admin.index', [
            'page' => 'management/questions/view',
            'question' => Question::findOrFail($id),
        ]);
    }

    public function statistics(int $id): View
    {
        acesso('management', 1);

        return view('management.admin.index', [
            'page' => 'management/questions/statistics',
            'question' => Question::findOrFail($id),
        ]);
    }
}
