<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'serialUb'=> 'required',
            'tecnico'=> 'required',
            'faena'=> 'required',
            'DetalleReparacion'=> 'required',
            'fechaIngreso'=> 'required',
            'fechaReparacion'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            /* 'serialUb.required' => 'Ingresar serial UB',
            'tecnico.required' => 'Ingresar Tecnico',
            'faena.required' => 'Ingresar faena',
            'DetalleReparacion.required' => 'Ingresar Detalle de la reparacion',
            'fechaIngreso.required' => 'Ingresar fecha de Ingreso',
            'fechaReparacion.required' => 'Ingresar fecha de Reparacion', */
        ];
    }
}
