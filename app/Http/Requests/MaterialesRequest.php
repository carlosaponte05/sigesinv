<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialesRequest extends FormRequest
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
            'nombre' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'caracteristica' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'unidad' => 'required',
            'precio_ind' => 'required|numeric',
            'precio_und' => 'required|numeric',
            'stock_min' => 'required|numeric',
            'stock_max' => 'required|numeric' 
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el nombre del Material',
            'caracteristica.required' => 'Debe ingresar la característca o detalle del Material',
            'unidad.required' => 'Debe seleccionar la unidad',
            'precio_ind.required' => 'Debe ingresar el precio individual del Material',
            'precio_und.required' => 'Debe ingresar el precio al mayor o por unidad registrada',
            'precio_ind.numeric' => 'El precio debe ser un valor numérico',
            'precio_und.numeric' => 'El precio al mayo o por unidad debe ser numérico',
            'stock_min.required' => 'Debe ingresar el stock mínimo del materiales',
            'stock_max.required' => 'Debe ingresar el stock máximo',
            'stock_min.numeric' => 'El stock mínimo debe ser numerico',
            'stock_max.numeric' => 'El stock máximo debe ser numérico '
        ];
    }
}
