<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenCompraRequest extends FormRequest
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
            'codigo' => 'required',
            'id_proveedor' => 'required',
            'materiales' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'Debe ingresar el código de la orden de compra',
            'id_proveedor.required' => 'Debe seleccionar un proveedor',
            'materiales' => 'Debe seleccionar al menos un material'
        ];
    }
}
