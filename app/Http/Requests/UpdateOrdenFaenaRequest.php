<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrdenFaenaRequest extends FormRequest
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
            'fecha_trabajo' => 'nullable|date',
            'equipo_minero_id'=> 'required',
            'estado' => 'required|in:pendiente,en_proceso,completado',
            'uman_serial' => 'required|string|exists:equipos_uman,serial',
            'cambio_uman' => 'required|boolean',
            'serial_nueva_uman' => ['nullable', 'required_if:cambio_uman,true', 'exists:equipos_uman,serial',],
            'falla' => 'nullable|string|max:255',
            'descripcion_falla' => 'nullable|string',
            'detalle_reparacion' => 'nullable|string',
            'fecha_ingreso' => 'nullable|date',
        ];
    }
}
