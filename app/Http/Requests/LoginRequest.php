<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'user_email.required' => 'O campo email é obrigatório.',
            'user_email.email' => 'Informe um email válido.',
            'user_email.unique' => 'Este email já está cadastrado.',

            'user_password.required' => 'O campo senha é obrigatório.',
            'user_password.min' => 'A senha deve conter no mínimo 6 caracteres.',
        ];
    }
}
