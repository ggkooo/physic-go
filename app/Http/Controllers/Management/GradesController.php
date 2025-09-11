<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradesRequest;
use App\Models\Grade;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class GradesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function grades(): View|RedirectResponse
    {
        if (Auth::check()) {
            $limit = request('limit', 5);
            if ($limit === 'all') {
                $grades = Grade::all();
            } else {
                $grades = Grade::paginate((int)$limit);
            }

            return view('management.admin.index', [
                'page' => 'management/grades/display',
                'grades' => $grades,
            ]);
        }

        return redirect('login');
    }

    public function register(): View
    {
        return view('management.admin.index', [
            'page' => 'management/grades/form',
            'type' => 'register',
        ]);
    }

    public function edit(int $id): View
    {
        $grade = Grade::findOrFail($id);

        return view('management.admin.index', [
            'page' => 'management/grades/form',
            'type' => 'edit',
            'grade' => $grade,
        ]);
    }

    public function store(GradesRequest $request): RedirectResponse
    {
        Grade::create($request->validated());

        return redirect()->route('management.grades')->with('success', 'Série cadastrada com sucesso!');
    }

    public function update(GradesRequest $request, $id): RedirectResponse
    {
        $grade = Grade::findOrFail($id);
        $grade->update($request->validated());

        return redirect()->route('management.grades')->with('success', 'Série atualizada com sucesso!');
    }

    public function remove($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect()->route('management.grades')->with('success', 'Série removida com sucesso!');
    }
}
