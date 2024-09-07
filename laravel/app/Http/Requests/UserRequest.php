<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',             // Minimo 8 caratteri
                'regex:/[a-z]/',     // Deve contenere almeno una lettera minuscola
                'regex:/[A-Z]/',     // Deve contenere almeno una lettera maiuscola
                'regex:/[0-9]/',     // Deve contenere almeno un numero
                'regex:/[@$!%*#?&]/' // Deve contenere almeno un carattere speciale
            ]
        ];
    }
}
