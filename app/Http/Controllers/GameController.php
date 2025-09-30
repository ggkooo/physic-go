<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
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

     public function menu()
    {
        return view('admin.index', ['page' => 'game/menu']);
    }

    public function new()
    {
        return view('admin.index', ['page' => 'game/new_game']);
    }

    public function display()
    {
        return view('admin.index', ['page' => 'game/display']);
    }

    public function students_ranking()
    {
        // Busca os 5 alunos com maior pontuação
        $topStudents = Ranking::orderByDesc('points')->limit(5)->get();
        return view('admin.index', [
            'page' => 'game.students_ranking', 
            'topStudents' => $topStudents
        ]);
    }

    public function questionsBySerie(Request $request)
    {
        $serie = $request->query('serie');
        if (!$serie) {
            return response()->json(['error' => 'Serie parameter is required'], 400);
        }
        $questions = Question::where('serie', $serie)->inRandomOrder()->limit(5)->get();
        return response()->json($questions);
    }

    public function saveRanking(Request $request)
    {
        $user = Auth::user();
        $points = $request->input('points');
        if (!$user || $points === null) {
            return response()->json(['error' => 'Dados insuficientes'], 400);
        }
        // Busca o ranking atual do usuário
        $ranking = Ranking::where('user_id', $user->id)->first();
        if ($ranking) {
            $ranking->points += $points;
            $ranking->user_name = $user->name;
            $ranking->save();
        } else {
            $ranking = Ranking::create([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'points' => $points,
            ]);
        }
        return response()->json(['success' => true, 'ranking' => $ranking]);
    }

    public function schools_ranking(){
        return view('admin.index', ['page' => 'game/schools_ranking']);
    }

    public function rules(){
        return view('admin.index', ['page' => 'game/rules']);
    }
}
