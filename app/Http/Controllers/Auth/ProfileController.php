<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\UserQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = Auth::user();
        $answers = UserQuestionAnswer::where('user_id', $user->id);
        $totalAnswered = (clone $answers)->count();
        $totalCorrect = (clone $answers)->where('is_correct', true)->count();
        $accuracyRate = $totalAnswered > 0 ? round(($totalCorrect / $totalAnswered) * 100, 1) : 0;
        $averageTime = round((float) ((clone $answers)->avg('response_time_seconds') ?? 0), 1);
        $totalXp = (int) (clone $answers)->sum('xp_earned');

        $topicsWithMostErrors = UserQuestionAnswer::query()
            ->join('questions', 'questions.id', '=', 'user_question_answers.question_id')
            ->where('user_question_answers.user_id', $user->id)
            ->where('user_question_answers.is_correct', false)
            ->selectRaw('questions.content AS topic, COUNT(*) AS errors')
            ->groupBy('questions.content')
            ->orderByDesc('errors')
            ->limit(5)
            ->get();

        $medals = $this->medals($totalAnswered, $totalCorrect, $accuracyRate, $totalXp);

        return view('admin.index', [
            'page' => 'auth/edit',
            'schools' => School::orderBy('school_name')->get(),
            'avatars' => $this->avatars(),
            'stats' => compact('totalAnswered', 'totalCorrect', 'accuracyRate', 'averageTime', 'totalXp'),
            'topicsWithMostErrors' => $topicsWithMostErrors,
            'medals' => $medals,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'school' => ['nullable', 'string', 'max:255'],
            'avatar' => ['required', Rule::in(array_keys($this->avatars()))],
        ]);

        $user->update($data);
        return redirect()->route('profile.edit')->with('success', 'Perfil atualizado com sucesso!');
    }

    private function medals(int $answered, int $correct, float $rate, int $xp): array
    {
        return [
            ['name' => 'Primeiro Passo', 'description' => 'Responda sua primeira questão', 'icon' => 'bi-flag-fill', 'earned' => $answered >= 1],
            ['name' => 'Estudante Dedicado', 'description' => 'Responda 25 questões', 'icon' => 'bi-book-fill', 'earned' => $answered >= 25],
            ['name' => 'Mente Brilhante', 'description' => 'Acerte 50 questões', 'icon' => 'bi-lightbulb-fill', 'earned' => $correct >= 50],
            ['name' => 'Alta Precisão', 'description' => 'Tenha 80% de acertos após 20 respostas', 'icon' => 'bi-bullseye', 'earned' => $answered >= 20 && $rate >= 80],
            ['name' => 'Mestre da Física', 'description' => 'Alcance 1.000 XP', 'icon' => 'bi-trophy-fill', 'earned' => $xp >= 1000],
        ];
    }

    private function avatars(): array
    {
        return [
            'explorador' => ['emoji' => '🧑‍🚀', 'name' => 'Explorador'],
            'cientista' => ['emoji' => '🧑‍🔬', 'name' => 'Cientista'],
            'inventora' => ['emoji' => '👩‍💻', 'name' => 'Inventora'],
            'inventor' => ['emoji' => '👨‍💻', 'name' => 'Inventor'],
            'robo' => ['emoji' => '🤖', 'name' => 'Robô'],
            'raposa' => ['emoji' => '🦊', 'name' => 'Raposa'],
            'coruja' => ['emoji' => '🦉', 'name' => 'Coruja'],
            'alien' => ['emoji' => '👽', 'name' => 'Alien'],
        ];
    }
}
