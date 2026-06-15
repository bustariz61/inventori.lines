<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array{
        return [
            'cedula' => 'required|inter|max:50',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'telefono' => 'required|string|max:11',
            'telefono_ubicacion' => 'required|string|max:11',
            'ubicacion' => 'required|string|max:50',

        ];
    }
}
