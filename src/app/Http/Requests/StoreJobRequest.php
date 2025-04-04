<?php

namespace App\Http\Requests;

use App\Enums\JobType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'type' => ['required', Rule::enum(JobType::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O título deve ser um texto válido.',
            'title.max' => 'O título não pode ter mais que 255 caracteres.',

            'company.required' => 'O campo empresa é obrigatório.',
            'company.string' => 'O nome da empresa deve ser um texto válido.',
            'company.max' => 'O nome da empresa não pode ter mais que 255 caracteres.',

            'location.required' => 'O campo localização é obrigatório.',
            'location.string' => 'A localização deve ser um texto válido.',
            'location.max' => 'A localização não pode ter mais que 255 caracteres.',

            'description.required' => 'A descrição do trabalho é obrigatória.',

            'type.required' => 'O tipo de trabalho é obrigatório.',
            'type.enum' => 'O tipo de trabalho selecionado é inválido.',
        ];
    }
}
