<?php

namespace App\Exports;

use App\Models\OrdenLaboratorio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdenesLaboratorioExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return OrdenLaboratorio::with(['tecnico', 'faena', 'equipoMinero', 'pcbUman', 'versionUman'])
            ->get()
            ->map(function ($orden) {
                return [
                    $orden->id,
                    $orden->tecnico->name ?? '—',
                    $orden->faena->name ?? '—',
                    $orden->equipoMinero->name ?? '—',
                    $orden->equipo_uman_serial,
                    $orden->estado,
                    $orden->pcbUman?->name,
                    $orden->ups_serial,
                    $orden->rpi_version,
                    $orden->versionUman?->name,
                    $orden->bam,
                    $orden->marca_bam,
                    $orden->chip,
                    $orden->imei_chip,
                    $orden->falla,
                    $orden->descripcion_falla,
                    $orden->detalle_reparacion,
                    $orden->fecha_ingreso,
                    $orden->fecha_reparacion,
                    $orden->horas_reparacion,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Orden Laboratorio',
            'Técnico',
            'Faena',
            'Equipo Minero',
            'Serial UMAN',
            'Estado',
            'PCB UMAN',
            'UPS',
            'Raspberry',
            'Version UMAN',
            'BAM',
            'Marca BAM',
            'CHIP',
            'IMEI CHIP',
            'Falla',
            'Descripción Falla',
            'Detalle Reparación',
            'Fecha Ingreso',
            'Fecha Reparación',
            'Horas Reparación',
        ];
    }
}