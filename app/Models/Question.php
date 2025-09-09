<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'grade',
        'content',
        'source',
        'tip',
        'tip_attachment',
        'statement',
        'statement_attachment1',
        'statement_attachment2',
        'statement_attachment3',
        'correct_option',
        'option_a',
        'option_a_attachment',
        'option_b',
        'option_b_attachment',
        'option_c',
        'option_c_attachment',
        'option_d',
        'option_d_attachment',
        'option_e',
        'option_e_attachment',
    ];

    public static function saveFromRequest(array $data, array $files = [])
    {
        $fieldsWithFiles = [
            'tip_attachment',
            'statement_attachment1',
            'statement_attachment2',
            'statement_attachment3',
            'option_a_attachment',
            'option_b_attachment',
            'option_c_attachment',
            'option_d_attachment',
            'option_e_attachment',
        ];
        foreach ($fieldsWithFiles as $field) {
            if (isset($files[$field]) && $files[$field] && $files[$field]->isValid()) {
                $data[$field] = $files[$field]->store('questions/attachments', 'public');
            } else {
                // If not present, ensure null is set for optional attachments
                $data[$field] = $data[$field] ?? null;
            }
        }
        return self::create($data);
    }
}
