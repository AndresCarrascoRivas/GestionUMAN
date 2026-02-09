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
            'estado' => 'required|in:Pendiente,En proceso,Completado',
            'uman_serial' => 'required|string|exists:equipos_uman,serial',
            'cambio_uman' => 'required|boolean',
            'serial_nueva_uman' => ['nullable', 'required_if:cambio_uman,true', 'exists:equipos_uman,serial',],
            'falla_id' => [
                'nullable',
                'exists:fallas,id',
                'required_if:cambio_uman,1',
            ],

            'descripcion_falla'   => 'nullable|string|max:1000',
            'detalle_reparacion'  => 'nullable|string|max:2000',
            'trabajo_realizado'   => 'nullable|string|max:1000',
            'descripcion_trabajo' => 'nullable|string|max:2000',
            'fecha_ingreso' => 'nullable|date',
            'imagen' => [
                'nullable',
                'image',
                'max:2048', // 2MB
            ],
        ];
    }
}
