<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrdenLaboratorioRequest extends FormRequest
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
            'equipo_uman_serial' => ['required', 'string', 'min:5', 'exists:equipos_uman,serial'],
            'tecnico_id'=> 'required',
            'faena_id'=> 'required',
            'equipo_minero_id'=> 'nullable',
            'estado' => ['required', Rule::in(['pendiente', 'en_proceso', 'completado'])],
            'falla' => ['required', 'string', 'min:1'],
            'fecha_ingreso'=> 'required',
            'pcb_uman_serial' => 'nullable|string|max:255',
            'ups_serial' => 'nullable|string|max:255',
            'rpi_version' => 'nullable|string|max:255',
            'firmware_version' => 'nullable|string|max:255',
            'descripcion_falla' => 'nullable|string',
            'detalle_reparacion' => 'nullable|string',
            'fecha_reparacion' => 'nullable|date',
            'horas_reparacion' => 'nullable|numeric|min:0',
        ];
    }
}
