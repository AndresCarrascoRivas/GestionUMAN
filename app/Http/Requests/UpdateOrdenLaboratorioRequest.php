<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrdenLaboratorioRequest extends FormRequest
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
            'uman_serial' => 'required|string|exists:equipos_uman,serial',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'faena_id' => 'required|exists:faenas,id',
            'equipo_minero'=> 'required',
            'estado' => 'required|in:pendiente,en_proceso,completado',
            'pcb_uman_serial' => 'nullable|string|max:255',
            'ups_serial' => 'nullable|string|max:255',
            'rpi_version' => 'nullable|string|max:255',
            'firmware_version' => 'nullable|string|max:255',
            'falla' => 'nullable|string|max:255',
            'descripcion_falla' => 'nullable|string',
            'detalle_reparacion' => 'nullable|string',
            'fecha_ingreso' => 'nullable|date',
            'fecha_reparacion' => 'nullable|date',
            'horas_reparacion' => 'nullable|numeric|min:0',
        ];
    }
}
