<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\SchoolRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function schools(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            $limit = $request->input('limit', 5);
            if ($limit === 'all') {
                $schools = School::all();
            } else {
                $schools = School::paginate($limit);
            }
            return view('management.admin.index', [
                'page' => 'management/schools/display',
                'schools' => $schools
            ]);
        }

        return redirect()->route('login');
    }

    public function register(): View|RedirectResponse
    {
        if (Auth::check()) {
            return view('management.admin.index', [
                'page' => 'management/schools/form'
            ]);
        }

        return redirect()->route('login');
    }

    public function edit($id): View|RedirectResponse
    {
        if (Auth::check()) {
            $school = School::find($id);
            if ($school) {
                return view('management.admin.index', [
                    'page' => 'management/schools/form',
                    'school' => $school
                ]);
            }

            return redirect()->route('management.schools')->with('error', 'Escola não encontrada.');
        }

        return redirect()->route('login');
    }

    public function store(SchoolRequest $request): RedirectResponse
    {
        if (Auth::check()) {
            $school = School::create($request->validated());

            return redirect()->route('management.schools')->with('success', 'Escola cadastrada com sucesso.');
        }

        return redirect()->route('login');
    }

    public function update(SchoolRequest $request, $id): RedirectResponse
    {
        if (Auth::check()) {
            $school = School::find($id);
            if ($school) {
                $school->update($request->validated());
                return redirect()->route('management.schools')->with('success', 'Escola atualizada com sucesso.');
            }
            return redirect()->route('management.schools')->with('error', 'Escola não encontrada.');
        }
        return redirect()->route('login');
    }

    public function remove($id): RedirectResponse
    {
        if (Auth::check()) {
            $school = School::find($id);
            if ($school) {
                $school->delete();

                return redirect()->route('management.schools')->with('success', 'Escola removida com sucesso.');
            }

            return redirect()->route('management.schools')->with('error', 'Escola não encontrada.');
        }

        return redirect()->route('login');
    }
}
