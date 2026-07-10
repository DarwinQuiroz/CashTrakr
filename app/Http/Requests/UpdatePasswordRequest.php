<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'Debes ingresar tu contraseña actual.',
            'current_password.current_password' => 'La contraseña actual es incorrecta.',
            'password.required' => 'La Nueva Contraseña no puede ir vacia',
            'password.min' => 'La Contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'Las Nuevas Contraseñas no coinciden.',
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
            'current_password' => ['required', 'current_password'],
            // 'password' => ['required', 'confirmed', 'min:8'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->symbols()->numbers()->uncompromised()
            ]
        ];
    }
}
