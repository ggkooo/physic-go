<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\Group;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;

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
                $challenges = \App\Models\Challenge::orderBy('id', 'desc')->paginate((int) $limit);
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
        // acesso('gestao_usuarios', 1);

        $users = User::with('groups')->orderBy('name')->get();

        return view('management.admin.index', [
            'page' => 'management/users/display',
            'users' => $users,
        ]);
    }

    public function usersEdit(int $id)
    {
        // acesso('gestao_usuarios', 1);

        return view('management.admin.index', [
            'page' => 'management/users/edit',
            'editUser' => User::with('groups')->findOrFail($id),
            'groups' => Group::orderBy('description')->orderBy('name')->get(),
        ]);
    }

    public function usersUpdate(Request $request, int $id)
    {
        // acesso('gestao_usuarios', 1);

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'cpf' => ['nullable', 'string', 'max:20'],
            'telefone' => ['nullable', 'string', 'max:30'],
            'cargo' => ['required', 'string', 'max:50'],
            'groups' => ['nullable', 'array'],
            'groups.*' => ['integer', 'exists:groups,id'],
        ]);

        $user->update([
            'name' => $validated['nome'],
            'email' => $validated['email'],
            'cpf' => $validated['cpf'] ?? null,
            'phone' => $validated['telefone'] ?? null,
            'user_account_type' => $validated['cargo'],
        ]);

        $user->groups()->sync($validated['groups'] ?? []);

        return redirect()->route('management.users.edit', $user->id)
            ->with('success', 'Usuário e permissões atualizados com sucesso!');
    }

    public function usersRemove(int $id)
    {
        // acesso('gestao_usuarios', 1);

        User::findOrFail($id)->delete();

        return redirect()->route('management.users')->with('success', 'Usuário removido com sucesso!');
    }

    public function groups()
    {
        acesso('gestao_usuarios', 1);

        return view('management.admin.index', [
            'page' => 'management/groups/display',
            'groups' => Group::withCount('users')->orderBy('description')->orderBy('name')->get(),
        ]);
    }

    public function groupsCreate()
    {
        // acesso('gestao_usuarios', 1);

        return view('management.admin.index', ['page' => 'management/groups/edit']);
    }

    public function groupsStore(Request $request)
    {
        // acesso('gestao_usuarios', 1);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:groups,name'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
        Group::create($validated);

        return redirect()->route('management.groups')->with('success', 'Grupo cadastrado com sucesso!');
    }

    public function groupsEdit(int $id)
    {
        // acesso('gestao_usuarios', 1);

        return view('management.admin.index', [
            'page' => 'management/groups/edit',
            'editGroup' => Group::findOrFail($id),
        ]);
    }

    public function groupsUpdate(Request $request, int $id)
    {
        // acesso('gestao_usuarios', 1);

        $group = Group::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('groups', 'name')->ignore($group->id)],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
        $group->update($validated);

        return redirect()->route('management.groups')->with('success', 'Grupo atualizado com sucesso!');
    }

    public function groupsRemove(int $id)
    {
        // acesso('gestao_usuarios', 1);

        Group::findOrFail($id)->delete();

        return redirect()->route('management.groups')->with('success', 'Grupo removido com sucesso!');
    }

}
