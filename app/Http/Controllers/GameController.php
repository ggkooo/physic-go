<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Ranking;
use App\Models\Grade;
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
        $grades = Grade::orderBy('name')->get();

        return view('admin.index', [
            'page' => 'game/new_game',
            'grades' => $grades
        ]);
    }

    public function display(Grade $grade)
    {
        return view('admin.index', [
            'page' => 'game/display',
            'grade' => $grade
        ]);
    }

    public function students_ranking()
    {
        $topStudents = Ranking::orderByDesc('points')->limit(5)->get();
        return view('admin.index', [
            'page' => 'game.students_ranking',
            'topStudents' => $topStudents
        ]);
    }

    public function questionsBySerie(Grade $grade)
    {
        $questions = Question::where('grade', $grade->name)
            ->inRandomOrder()
            ->get();

        return response()->json($questions);
    }

    public function saveRanking(Request $request)
    {
        $user = Auth::user();
        $points = $request->input('points');
        if (!$user || $points === null) {
            return response()->json(['error' => 'Dados insuficientes'], 400);
        }

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

    public function schools_ranking()
    {
        return view('admin.index', ['page' => 'game/schools_ranking']);
    }

    public function rules()
    {
        return view('admin.index', ['page' => 'game/rules']);
    }
}
