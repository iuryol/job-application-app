<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['email','required','string','max:255',Rule::unique('users')->ignore($this->user)],
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
            'email.email' => 'Insira um formato de e-mail válido.',
            'email.string' => 'Formato inválido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este e-mail já está sendo utilizado por outro usuário.',

            'linkedin.string' => 'O campo LinkedIn deve ser um texto.',
            'linkedin.url' => 'O campo deve ser uma url.',
            'linkedin.max' => 'O LinkedIn não pode ter mais que 255 caracteres.',
        ];
    }

}
