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
            'serial'            => ['required', 'string', 'min:5', 'unique:equipos_uman,serial'],
            'tecnico_id'        => ['required', 'exists:tecnicos,id'],
            'estado'            => ['required', Rule::in(['activo', 'inactivo'])],
            'modelo_uman'       => 'required|in:UMAN BLUE,UMAN CM4',
            'uman_version_id'   => ['required', 'exists:version_umans,id'],
            'version_sd_id'     => ['required', 'exists:version_sds,id'],
            'pcb_uman_id'       => ['required', 'exists:pcb_umans,id'],
            'rpi_version'       => ['nullable', 'string', 'max:255'],
            'ups_version'       => ['nullable', 'required_if:uman_version,UMAN BLUE'],  
            'pcb_antenna'       => ['nullable', 'string', 'max:255'],
            'radiometrix'       => ['nullable', 'string', 'max:255'],
            'bam'               => ['boolean'],
            'marca_bam'         => ['nullable', 'required_if:bam,1'],
            'chip'              => ['nullable', 'required_if:bam,1'],
            'imei_chip'         => ['nullable', 'required_if:bam,1'],
            'fecha_fabricacion' => ['required', 'date', 'before_or_equal:today'],
        ];
    }

    public function messages()
    {
        return [
            'serial.required' => 'El número de serie es obligatorio.',
            'serial.unique'   => 'Ya existe un equipo con ese número de serie.',
            'serial.min'      => 'El número de serie debe tener al menos 5 caracteres.',

            'tecnico_id.required' => 'Debes asignar un técnico responsable.',
            'tecnico_id.exists'   => 'El técnico seleccionado no existe en el sistema.',

            'estado.required' => 'El estado del equipo es obligatorio.',
            'estado.in'       => 'El estado debe ser activo o inactivo.',

            'modelo_uman.string' => 'El modelo UMAN debe ser un texto válido.',

            'uman_version_id.required' => 'Debes seleccionar una versión UMAN.',
            'uman_version_id.exists'   => 'La versión UMAN seleccionada no existe.',

            'version_sd_id.required' => 'Debes seleccionar una versión SD.',
            'version_sd_id.exists'   => 'La versión SD seleccionada no existe.',

            'pcb_uman_id.required' => 'Debes seleccionar una PCB UMAN.',
            'pcb_uman_id.exists'   => 'La PCB UMAN seleccionada no existe.',

            'rpi_version.required' => 'La versión de Raspberry Pi es obligatoria.',

            'ups_version.required_if' => 'La versión de UPS es obligatoria si corresponde.',

            'pcb_antenna.required' => 'Debes especificar la versión de PCB Antenna.',
            'radiometrix.required' => 'Debes indicar el modelo de Radiometrix.',

            'fecha_fabricacion.required'        => 'La fecha de fabricación es obligatoria.',
            'fecha_fabricacion.date'            => 'La fecha de fabricación debe tener un formato válido.',
            'fecha_fabricacion.before_or_equal' => 'La fecha de fabricación no puede ser futura.',
        ];
    }
}
