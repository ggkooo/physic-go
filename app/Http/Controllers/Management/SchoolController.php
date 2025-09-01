<?php

namespace App\Http\Controllers\Management;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Requests\Management\CreateSchoolRequest;

class SchoolController extends Controller
{
    public function schools()
    {
        if (Auth::check()) {
            $schools = School::all();
            return view('management.admin.index', [
                'page' => 'management/schools/display',
                'schools' => $schools
            ]);
        }
    }

    public function schoolsRegister()
    {
        if (Auth::check()) {
            return view('management.admin.index', ['page' => 'management/schools/register-edit']);
        }
    }

    public function schoolsStore(CreateSchoolRequest $request)
    {
        if (Auth::check()) {
            $school = School::create($request->validated());
            return redirect()->route('management.schools')->with('success', 'Escola cadastrada com sucesso.');
        }
    }

    public function removeSchool($id)
    {
        if (Auth::check()) {
            $school = School::find($id);
            if ($school) {
                $school->delete();
                return redirect()->route('management.schools')->with('success', 'Escola removida com sucesso.');
            }
            return redirect()->route('management.schools')->with('error', 'Escola não encontrada.');
        }
    }

    public function editSchool($id)
    {
        if (Auth::check()) {
            $school = School::find($id);
            if ($school) {
                return view('management.admin.index', [
                    'page' => 'management/schools/register-edit',
                    'school' => $school
                ]);
            }
            return redirect()->route('management.schools')->with('error', 'Escola não encontrada.');
        }
    }

    public function updateSchool(Request $request, $id)
    {
        if (Auth::check()) {
            $school = School::find($id);
            if ($school) {
                $school->update($request->validate([
                    'nome_escola' => 'required|string|max:255',
                    'state' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                ]));
                return redirect()->route('management.schools')->with('success', 'Escola atualizada com sucesso.');
            }
            return redirect()->route('management.schools')->with('error', 'Escola não encontrada.');
        }
    }
}
