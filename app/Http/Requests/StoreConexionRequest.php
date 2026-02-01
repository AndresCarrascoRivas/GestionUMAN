<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConexionRequest extends FormRequest
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
                        'faena_id'   => 'required|exists:faenas,id',
            'tipo'       => 'required|in:wifi,ethernet,bam',
            'ip'         => 'nullable|string|max:45',
            'gateway'    => 'nullable|string|max:45',
            'netmask'    => 'nullable|string|max:45',
            'operador'   => 'nullable|string|max:100',
            'apn'        => 'nullable|string|max:100',
            'apn_user'   => 'nullable|string|max:100',
            'apn_pass'   => 'nullable|string|max:100',
        ];
    }

        public function messages(): array
    {
        return [
            'faena_id.required' => 'Debes seleccionar una faena.',
            'faena_id.exists'   => 'La faena seleccionada no existe.',
            'tipo.required'     => 'El tipo de conexión es obligatorio.',
            'tipo.in'           => 'El tipo de conexión debe ser wifi, ethernet o bam.',
        ];
    }
}
