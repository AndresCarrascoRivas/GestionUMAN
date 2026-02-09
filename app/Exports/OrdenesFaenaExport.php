<?php

namespace App\Exports;

use App\Models\OrdenFaena;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdenesFaenaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return OrdenFaena::with(['tecnico', 'faena', 'equipoMinero', 'falla'])->get()->map(function ($orden) {
            return [
                $orden->tecnico->name ?? '—',
                $orden->faena->name ?? '—',
                $orden->fecha_trabajo,
                $orden->equipoMinero->name ?? '—',
                ucfirst($orden->estado),
                $orden->uman_serial,
                $orden->cambio_uman ? 'Sí' : 'No',
                $orden->serial_nueva_uman ?? '—',
                $orden->falla->name ?? '—',
                $orden->descripcion_falla,
                $orden->trabajo_realizado,
                $orden->descripcion_trabajo,
                $orden->imagen ?? '—',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Técnico',
            'Faena',
            'Fecha de Trabajo',
            'Equipo Minero',
            'Estado',
            'Serial UMAN',
            '¿Cambio UMAN?',
            'Serial Nueva UMAN',
            'Falla',
            'Descripción de la Falla',
            'Trabajo Realizado',
            'Descripcion Trabajo',
            'Imagen',
        ];
    }
}