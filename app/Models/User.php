<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Alterado
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'phone',
        'state',
        'city',
        'school',
        'class',
        'user_account_type',
    ];

    public static function createUser(array $data): JsonResponse
    {
        $data['user_password'] = Hash::make($data['user_password']);

        $userId = DB::table("users")->insertGetId([
            'name' => $data['user_name'], 
            'email' => $data['user_email'], 
            'password' => $data['user_password']
        ]);

        $user = self::find($userId);

        return response()->json($user, 201);
    }
}
