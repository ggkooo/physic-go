<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\EditUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users()
    {
        acesso('admin', 1);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $users = User::with('groups')
            ->orderBy('name')
            ->get();

        return view('management.admin.index', [
            'page' => 'management/users/display',
            'users' => $users,
        ]);
    }

    public function editUser($id)
    {
        acesso('admin', 1);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::with('groups')->findOrFail($id);

        $groups = Group::orderBy('description')
            ->orderBy('name')
            ->get();

        return view('management.admin.index', [
            'page' => 'management/users/edit',
            'editUser' => $user,
            'groups' => $groups,
        ]);
    }

    public function updateUser(EditUserRequest $request, $id)
    {
        acesso('admin', 1);

        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Você precisa estar autenticado.');
        }

        $validated = $request->validated();

        $user = User::findOrFail($id);

        DB::transaction(function () use ($user, $validated) {
            $user->update([
                'name' => $validated['nome'],
                'email' => $validated['email'],
                'cpf' => $validated['cpf'] ?? null,
                'phone' => $validated['telefone'] ?? null,
                'user_account_type' => $validated['cargo'],
            ]);

            $user->groups()->sync($validated['groups'] ?? []);
        });

        return redirect()
            ->route('management.users')
            ->with('success', 'Usuário e permissões salvos com sucesso!');
    }


    public function removeUser($id)
    {
        acesso('admin', 1);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::findOrFail($id);

        DB::transaction(function () use ($user) {
            // Remove os vínculos antes de remover o usuário.
            $user->groups()->detach();

            $user->delete();
        });

        return redirect()
            ->route('management.users')
            ->with('success', 'Usuário removido com sucesso!');
    }
}
