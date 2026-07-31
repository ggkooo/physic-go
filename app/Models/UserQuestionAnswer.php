<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    protected $fillable = [
        'user_id', 'question_id', 'selected_option', 'is_correct',
        'response_time_seconds', 'xp_earned',
    ];

    protected $casts = ['is_correct' => 'boolean'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
