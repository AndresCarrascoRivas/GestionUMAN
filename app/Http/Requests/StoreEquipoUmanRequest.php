<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEquipoUmanRequest extends FormRequest
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
            'serial' => ['required', 'string', 'max:10', 'unique:equipos_uman,serial'],
            'uman_version' => 'required|in:UMAN BLUE,UMAN CM4',
            'tecnico_id' => ['required', 'exists:tecnicos,id'],
            'estado' => ['required', Rule::in(['activo', 'inactivo'])],
            'rpi_version' => 'required',
            'ups_version' => ['nullable', 'required_if:uman_version,UMAN BLUE'],
            'pcb_uman' => 'required',
            'pcb_antenna' => 'required',
            'radiometrix' => 'required',
            'fecha_fabricacion' => 'required|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'serial.required' => 'El número de serie es obligatorio.',
            'serial.unique' => 'Ya existe un equipo con ese número de serie.',
            'serial.max' => 'El número de serie no puede tener más de 10 caracteres.',

            'uman_version.required' => 'Debes seleccionar una versión UMAN.',

            'tecnico_id.required' => 'Debes asignar un técnico responsable.',
            'tecnico_id.exists' => 'El técnico seleccionado no existe en el sistema.',

            'estado.required' => 'El estado del equipo es obligatorio.',
            'estado.in' => 'El estado debe ser activo o inactivo.',

            'rpi_version.required' => 'La versión de Raspberry Pi es obligatoria.',

            'ups_version.required_if' => 'La versión de UPS es obligatoria si el equipo es UMAN BLUE.',

            'pcb_uman.required' => 'Debes especificar la versión de PCB UMAN.',
            'pcb_antenna.required' => 'Debes especificar la versión de PCB Antenna.',
            'adiometrix.required' => 'Debes indicar el modelo de Adiometrix.',

            'fecha_fabricacion.required' => 'La fecha de fabricación es obligatoria.',
            'fecha_fabricacion.date' => 'La fecha de fabricación debe tener un formato válido.',
            'fecha_fabricacion.before_or_equal' => 'La fecha de fabricación no puede ser futura.',
        ];
    }
}
