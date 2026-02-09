<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEquipoMineroRequest extends FormRequest
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
            'name'                  => 'required|string|max:255',
            'modelo'                => 'required|string|max:255',
            'tipo'                  => 'required|string|max:255',
            'faena_id'              => 'required|exists:faenas,id',
            'uman_serial'           => [
                'nullable',
                'string',
                Rule::unique('equipo_minero', 'uman_serial')->ignore($this->equipo_minero),
            ],
            'posicion_equipo_uman'  => 'nullable|string|max:255',
            'dcdc'                  => 'boolean',
            'puesta_tierra'         => 'boolean',
            'antena_rf_mt'          => 'nullable|numeric|min:0',
            'antena_gps_mt'         => 'nullable|numeric|min:0',
            'hmi_mt'                => 'nullable|numeric|min:0',
            'cable_alimentacion_mt' => 'nullable|numeric|min:0',
        ];
    }
}
