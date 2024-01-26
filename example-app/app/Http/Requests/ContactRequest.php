<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nome' => 'required',
            'numero' => 'required|max:11',
            'whatsapp' => 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'nome.required' => 'Campo nome é obrigatório!',
            'numero.required' => 'Campo numero é obrigatório!',
            'numero.max' => 'O numero só pode ter no máximo 11 números!',
            'whatsapp.required' => 'Campo  é obrigatório!',
        ];
    }
}