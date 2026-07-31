<?php

namespace App\Http\Requests\Management;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('id');

        return [
            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            'cpf' => [
                'nullable',
                'string',
                'max:20',
            ],

            'telefone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'cargo' => [
                'required',
                'string',
                'max:50',
            ],

            'groups' => [
                'nullable',
                'array',
            ],

            'groups.*' => [
                'integer',
                'distinct',
                'exists:groups,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do usuário.',
            'email.required' => 'Informe o e-mail do usuário.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está sendo utilizado.',
            'cargo.required' => 'Selecione o cargo do usuário.',
            'groups.array' => 'Os grupos selecionados são inválidos.',
            'groups.*.integer' => 'O grupo selecionado é inválido.',
            'groups.*.distinct' => 'Um grupo foi selecionado mais de uma vez.',
            'groups.*.exists' => 'Um dos grupos selecionados não existe.',
        ];
    }
}