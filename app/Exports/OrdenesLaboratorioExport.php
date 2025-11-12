<?php

namespace App\Exports;

use App\Models\OrdenLaboratorio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdenesLaboratorioExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return OrdenLaboratorio::all([
            'tecnico_id',
            'faena_id',
            'equipo_minero',
            'uman_serial',
            'estado',
            'pcb_uman_serial',
            'ups_serial',
            'rpi_version',
            'firmware_version',
            'falla',
            'descripcion_falla',
            'detalle_reparacion',
            'fecha_ingreso',
            'fecha_reparacion',
            'horas_reparacion'
            // Campos a exportar
        ]);
    }

    public function headings(): array
    {
        return [
            'Tecnico',
            'Faena',
            'Equipo Minero',
            'Serial UMAN',
            'Estado',
            'PCB UMAN',
            'UPS',
            'Raspberry',
            'Firmware',
            'Falla',
            'Descripcion Falla',
            'Detalle Reparacion',
            'Ingreso',
            'Reparacion',
            'Horas',
            // Encabezados legibles
        ];
    }
}
