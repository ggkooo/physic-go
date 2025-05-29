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
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|string|min:6',
            'user_confirm_password' => 'required|same:user_password',
            'user_account_type' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'O campo nome é obrigatório.',
            'user_name.string' => 'O nome deve conter apenas letras.',
            'user_name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'user_email.required' => 'O campo email é obrigatório.',
            'user_email.email' => 'Informe um email válido.',
            'user_email.unique' => 'Este email já está cadastrado.',

            'user_password.required' => 'A campo senha é obrigatório.',
            'user_password.min' => 'A senha deve conter no mínimo 6 caracteres.',

            'user_confirm_password.required' => 'A campo confirmação de senha é obrigatório.',
            'user_confirm_password.same' => 'As senhas digitadas não conferem. Tente novamente.',

            'user_account_type.required' => 'O campo Tipo de cadastro é obrigatório.',
        ];
    }
}
