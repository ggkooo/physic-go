<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Management\EditUserRequest;

class UserController extends Controller
{
    public function users()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('management.admin.index', [
                'page' => 'management/users/display',
                'users' => $users
            ]);
        }
    }

    public function editUser($id)
    {
        if (Auth::check()) {
            $user = User::findOrFail($id);
            return view('management.admin.index', [
                'page' => 'management/users/edit',
                'editUser' => $user
            ]);
        }
    }
    
    public function removeUser($id)
    {
        if (Auth::check()) {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('management.users')->with('success', 'Usuário removido com sucesso!');
        }
    }

    public function updateUser(EditUserRequest $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar autenticado.');
        }
        $user = User::findOrFail($id);
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->cpf = $request->input('cpf');
        $user->phone = $request->input('telefone');
        $user->user_account_type = $request->input('cargo');
        $user->save();
        return redirect()->route('management.users.edit', $user->id)->with('success', 'Usuário atualizado com sucesso!');
    }
}
