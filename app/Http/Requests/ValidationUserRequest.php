<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'tipo_cadastro' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve conter apenas letras.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'email.unique' => 'Este email já está cadastrado.',

            'user_password.required' => 'A campo senha é obrigatório.',
            'user_password.min' => 'A senha deve conter no mínimo 6 caracteres.',

            'confirm_password.required' => 'A campo confirmação de senha é obrigatório.',
            'confirm_password.same' => 'As senhas digitadas não conferem. Tente novamente.',

            'tipo_cadastro.required' => 'O campo Tipo de cadastro é obrigatório.',
        ];
    }
}
