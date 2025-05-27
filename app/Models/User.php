<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = ['name', 'email'];

    public static function createUser(array $data): JsonResponse
    {
        $data['user_password'] = Hash::make($data['user_password']);

        $user = DB::table("users")->insert(['name' => $data['user_name'], 'email' => $data['email'], 'password' => $data['user_password']]);

        return response()->json($user, 201);
    }
}
