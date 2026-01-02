<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            'equipo_uman_serial' => ['required', 'string', 'min:5', 'exists:equipos_uman,serial'],
            'tecnico_id'         => ['required', 'exists:tecnicos,id'],
            'faena_id'           => ['required', 'exists:faenas,id'],
            'equipo_minero_id'   => ['nullable', 'exists:equipo_minero,id'],
            'estado'             => ['required', Rule::in(['pendiente','en_proceso','completado'])],
            'pcb_uman_id'        => ['required', 'exists:pcb_umans,id'],
            'uman_version_id'    => ['required', 'exists:version_umans,id'],
            'rpi_version'        => ['nullable', 'string', 'max:255'],
            'ups_version'        => ['nullable', 'string', 'max:255'],
            'bam'                => ['boolean'],
            'marca_bam'          => ['nullable', 'required_if:bam,1', 'string', 'max:255'],
            'chip'               => ['nullable', 'required_if:bam,1', 'string', 'max:255'],
            'imei_chip'          => ['nullable', 'required_if:bam,1', 'string', 'max:255'],
            'falla'              => ['nullable', 'string', 'max:255'],
            'descripcion_falla'  => ['nullable', 'string'],
            'detalle_reparacion' => ['nullable', 'string'],
            'fecha_ingreso'      => ['required', 'date'],
            'fecha_reparacion'   => ['nullable', 'date'],
            'horas_reparacion'   => ['nullable', 'integer', 'min:0'],
        ];
    }
}
