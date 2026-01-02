<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckFaenaRequest extends FormRequest
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
            'tecnico_id' => 'required|exists:tecnicos,id',
            'faena_id' => 'required|exists:faenas,id',
            'equipo_minero_id' => 'required|exists:equipo_minero,id',
            'fecha_ingreso' => 'required|date',
            'caja_uman' => 'boolean',
            'hmi' => 'boolean',
            'antena_rf' => 'boolean',
            'antena_gps' => 'boolean',
            'conexion_electrica' => 'boolean',
            'sensores_internos' => 'boolean',
            'observacion' => 'nullable|string',
        ];
    }

        public function messages(): array
    {
        return [
            'tecnico_id.required' => 'Debe seleccionar un técnico.',
            'faena_id.required' => 'Debe seleccionar una faena.',
            'faena_id.exists' => 'La faena seleccionada no existe.',
            'equipo_minero_id.required' => 'Debe seleccionar un equipo minero.',
            'equipo_minero_id.exists' => 'El equipo minero seleccionado no existe.',
            'fecha_ingreso.required' => 'Debe ingresar la fecha de ingreso.',
            'fecha_ingreso.date' => 'La fecha de ingreso debe tener un formato válido.',
        ];
    }
}
