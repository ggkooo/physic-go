<?php

namespace App\Http\Requests\Management;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'grade' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'tip' => 'required|string',
            'tip_attachment' => 'nullable|file|max:4096',
            'statement' => 'required|string',
            'statement_attachment1' => 'nullable|file|max:4096',
            'statement_attachment2' => 'nullable|file|max:4096',
            'statement_attachment3' => 'nullable|file|max:4096',
            'correct_option' => 'required|string|in:a,b,c,d,e',
            'option_a' => 'required|string',
            'option_a_attachment' => 'nullable|file|max:4096',
            'option_b' => 'required|string',
            'option_b_attachment' => 'nullable|file|max:4096',
            'option_c' => 'required|string',
            'option_c_attachment' => 'nullable|file|max:4096',
            'option_d' => 'required|string',
            'option_d_attachment' => 'nullable|file|max:4096',
            'option_e' => 'nullable|string',
            'option_e_attachment' => 'nullable|file|max:4096',
        ];
    }
}
