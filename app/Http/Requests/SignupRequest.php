<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Override;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email no tiene un formato válido.',
            'email.unique' => 'El email se encuentra en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.letters' => 'La contraseña debe tener al menos 1 letra.',
            'password.mixed' => 'La contraseña debe tener al menos 1 letra mayúscula y 1 letra minúscula.',
            'password.symbols' => 'La contraseña debe tener al menos 1 caracter especial.',
            'password.numbers' => 'La contraseña debe tener al menos 1 número.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->symbols()->numbers()->uncompromised()
            ]
        ];
    }
}
