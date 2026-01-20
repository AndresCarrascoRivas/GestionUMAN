<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenLaboratorio extends Model
{
    protected $table = 'ordenes_laboratorio';

    protected $fillable = [
        'tecnico_id',
        'faena_id',
        'equipo_uman_serial',
        'equipo_minero_id',
        'estado',
        'pcb_uman_id',
        'version_sd_id',
        'ups_version',
        'rpi_version',
        'uman_version_id',
        'bam',
        'marca_bam',
        'chip',
        'imei_chip',
        'falla_id',
        'descripcion_falla',
        'detalle_reparacion',
        'fecha_ingreso',
        'fecha_reparacion',
        'horas_reparacion'
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }
    
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function equipoUman()
    {
        return $this->belongsTo(EquipoUman::class, 'equipo_uman_serial', 'serial');
    }

    public function equipoMinero()
    {
        return $this->belongsTo(EquipoMinero::class, 'equipo_minero_id');
    }

    public function pcbUman()
    {
        return $this->belongsTo(PcbUman::class, 'pcb_uman_id');
    }

    public function versionUman()
    {
        return $this->belongsTo(VersionUman::class, 'uman_version_id');
    }

    public function versionSd()
    {
        return $this->belongsTo(VersionSd::class, 'version_sd_id');
    }

        public function falla()
    {
        return $this->belongsTo(Falla::class);
    }

}
