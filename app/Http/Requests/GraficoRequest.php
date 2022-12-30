<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraficoRequest extends FormRequest
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
            'nombre' => 'required|exists:indicadores,nombreIndicador',
            'fecha_inicial' => 'required|date|lt:fecha_final',
            'fecha_final' => 'required|date|gt:fecha_inicial'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe seleccionar un indicador',
            'nombre.exists' => 'El indicador seleccionado no existe en la base de datos',
            'fecha_inicial.required' => 'Debe ingresar la fecha inicial',
            'fecha_inicial.date' => 'La fecha inicial debe tener un formato válido (dd-mm-yyyy)',
            'fecha_inicial.lt' => 'La fecha inicial debe ser menor a la fecha final',
            'fecha_final.required' => 'Debe ingresar la fecha final',
            'fecha_final.date' => 'La fecha final debe tener un formato válido (dd-mm-yyyy)',
            'fecha_final.gt' => 'La fecha final debe ser mayor a la fecha inicial',
        ];
    }
}
