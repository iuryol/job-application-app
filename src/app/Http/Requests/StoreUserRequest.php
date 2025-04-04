<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'email|required|string|max:255|unique:users',
            'password' => ['required','string','confirmed',Password::defaults()],
            'linkedin' => 'url|string|max:255|nullable',
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'O campo nome é obrigatório.',
        'name.string' => 'Formato inválido.',
        'name.max' => 'O nome não pode ter mais que 255 caracteres.',

        'email.required' => 'O campo e-mail é obrigatório.',
        'email.string' => 'Formato inválido.',
        'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
        'email.unique' => 'Este e-mail já está em uso.',

        'password.required' => 'A senha é obrigatória.',
        'password.string' => 'Formato inválido.',
        'password.confirmed' => 'A confirmação da senha não corresponde.',
        // Para Password::defaults(), o Laravel já traz mensagens em português se estiver usando a tradução correta
        'password.min' => 'A senha deve ter no mínimo :min caracteres.',
        'password.letters' => 'A senha deve conter pelo menos uma letra.',
        'password.numbers' => 'A senha deve conter pelo menos um número.',
        'password.symbols' => 'A senha deve conter pelo menos um símbolo.',
        'password.uncompromised' => 'Esta senha apareceu em um vazamento de dados. Por favor, escolha outra senha.',

        'linkedin.string' => 'Formato inválido.',
        'linkedin.max' => 'O campo não pode ter mais que 255 caracteres.',
        'linkedin.url' => 'O campo deve ser uma url.',
    ];
}

}
