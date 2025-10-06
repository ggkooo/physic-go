<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenge_questions';

    protected $fillable = [
        'statement',
        'hint',
        'source',
        'correct_alternative',
        'alternative_a',
        'alternative_b',
        'alternative_c',
        'alternative_d',
        'alternative_e',
        'attachment_01',
        'attachment_02',
        'attachment_03',
    ];
}
