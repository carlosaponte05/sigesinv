<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresRequest extends FormRequest
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
            'razon_social' => 'required',
            'rif' => 'required',
            'telefono' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'razon_social.required' => 'Debe ingresar la Razón Social del Proveedor',
            'rif.required' => 'Debe ingresar el RIF  del Proveedor',
            'telefono.required' => 'Debe ingresar el Número Telefónico'
        ];
    }
}
