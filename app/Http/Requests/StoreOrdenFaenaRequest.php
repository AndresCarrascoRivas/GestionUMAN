<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrdenFaenaRequest extends FormRequest
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
            'tecnico_id'=> 'required',
            'faena_id'=> 'required',
            'fecha_trabajo'=> 'required',
            'equipo_minero_id'=> 'required',
            'estado' => ['required', Rule::in(['Pendiente', 'En proceso', 'Completado'])],
            'uman_serial' => ['required', 'string', 'min:5', 'exists:equipos_uman,serial'],
            'cambio_uman' => 'boolean',
            'serial_nueva_uman' => [
                'nullable', // ← permite que sea opcional por defecto
                'required_if:cambio_uman,1', // ← obligatorio solo si cambio_uman es verdadero
                'string',
                'min:5',
                'exists:equipos_uman,serial',
            ],
            'falla' => ['required', 'string', 'min:1'],
            'descripcion_falla' => 'nullable|string',
            'imagen' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
