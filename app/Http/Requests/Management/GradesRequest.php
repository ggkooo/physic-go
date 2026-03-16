<?php

namespace App\Http\Requests\Management;

use Illuminate\Foundation\Http\FormRequest;

class GradesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}

