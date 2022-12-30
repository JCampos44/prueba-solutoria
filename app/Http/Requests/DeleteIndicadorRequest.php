<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteIndicadorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:indicadores,id'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'El ID del indicador es requerido',
            'id.exists' => 'Este ID no se encuentra registrado'
        ];
    }
}
