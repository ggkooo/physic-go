<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class School extends Model
{
    protected $fillable = [
        'nome_escola',
        'state',
        'city',
    ];

    public static function createSchool(array $data): JsonResponse
    {
        $schoolId = DB::table('schools')->insertGetId([
            'nome_escola' => $data['nome_escola'],
            'state' => $data['state'],
            'city' => $data['city'],
        ]);

        $school = self::find($schoolId);

        return response()->json($school, 201);
    }
}
