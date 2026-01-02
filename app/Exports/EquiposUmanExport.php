<?php

namespace App\Exports;

use App\Models\EquipoUman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquiposUmanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return EquipoUman::with(['tecnico','versionUman','versionSd','pcbUman'])
            ->get()
            ->map(function ($equipo) {
                return [
                    $equipo->serial,
                    $equipo->tecnico->name ?? '—',
                    ucfirst($equipo->estado),
                    $equipo->modelo_uman ?? '—',
                    $equipo->versionUman->name ?? '—',
                    $equipo->versionSd->version ?? '—',
                    $equipo->pcbUman->name ?? '—',
                    $equipo->rpi_version ?? '—',
                    $equipo->ups_version ?? '—',
                    $equipo->pcb_antenna ?? '—',
                    $equipo->radiometrix ?? '—',
                    $equipo->bam ? 'Sí' : 'No',
                    $equipo->marca_bam ?? '—',
                    $equipo->chip ?? '—',
                    $equipo->imei_chip ?? '—',
                    $equipo->fecha_fabricacion ?? '—',
                    $equipo->created_at?->format('d/m/Y H:i') ?? '—',
                    $equipo->updated_at?->format('d/m/Y H:i') ?? '—',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Serial',
            'Técnico',
            'Estado',
            'Modelo UMAN',
            'Versión UMAN',
            'Versión SD',
            'PCB UMAN',
            'Versión Raspberry',
            'Versión UPS',
            'PCB Antena',
            'Radiometrix',
            'BAM',
            'Marca BAM',
            'Chip',
            'IMEI Chip',
            'Fecha Fabricación',
            'Creado',
            'Actualizado',
        ];
    }
}
