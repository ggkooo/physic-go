<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Alterado
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'password']; // lembre de adicionar 'password'

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
