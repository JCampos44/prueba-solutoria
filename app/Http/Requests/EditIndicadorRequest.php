<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditIndicadorRequest extends FormRequest
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
            'id' => 'required|integer|exists:indicadores,id',
            'nombre' => 'required',
            'codigo' => 'required',
            'unidadMedida' => 'required',
            'valor' => 'required|numeric',
            'fecha' => 'required|date',
            'origen' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Debe especificar el indicador a editar',
            'id.integer' => 'El ID del indicador debe ser un número entero',
            'id.exists' => 'El ID indicado no existe',
            'nombre.required' => 'Debe seleccionar un indicador',
            'codigo.required' => 'Debe especificar el código',
            'unidadMedida.required' => 'Debe especificar la unidad de medida',
            'valor.required' => 'Debe indicar el valor',
            'valor.numeric' => 'El valor debe ser numérico',
            'fecha.required' => 'Debe seleccionar una fecha',
            'fecha.date' => 'La fecha debe tener un formato válido (dd-mm-yyyy)',
            'origen.required' => 'Debe indicar el origen'
        ];
    }
}
