<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'points' => ['required', 'integer', 'min:0'],
            'total_questions' => ['required', 'integer', 'min:1'],
        ]);

        $pointsPerQuestion = 10;
        $mustBe = $validated['total_questions'] * $pointsPerQuestion;
        if ((int) $validated['points'] !== $mustBe) {
            return response()->json([
                'ok' => false,
                'message' => 'Pontuação inválida para salvar ranking.'
            ], 422);
        }

        $ranking = Ranking::firstOrNew(['user_id' => $user->id]);

        $ranking->user_name = $user->name ?? ($ranking->user_name ?? 'Usuário');
        $ranking->points = (int) ($ranking->points ?? 0) + (int) $validated['points'];

        $ranking->save();

        return response()->json(['ok' => true, 'points_total' => $ranking->points]);
    }
}
