<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipoUbRequest extends FormRequest
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
            'serialUb' => 'required|string|max:10|unique:equipo_ubs,serialUb',
            'versionUman' => 'required|in:UMAN BLUE,UMAN CM4',
            'versionraspberry' => 'required',
            'versioUps' => 'required_if:versionUman,UMAN BLUE|nullable',
            'PcbUman' => 'required',
            'PcbAntena' => 'required',
            'Radiometrix' => 'required',
            'fechaFabricacion' => 'required|date|before_or_equal:today',
        ];
    }
}
