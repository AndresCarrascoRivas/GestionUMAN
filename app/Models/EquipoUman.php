<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoUman extends Model
{
    protected $primaryKey = 'serial';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'equipos_uman';

    protected $fillable = [
        'serial', 
        'tecnico_id',
        'faena_id', 
        'estado',
        'modelo_uman',
        'uman_version_id',
        'version_sd_id',
        'pcb_uman_id',
        'rpi_version',
        'ups_version',
        'pcb_antenna',
        'radiometrix',
        'bam',
        'marca_bam',
        'chip',
        'imei_chip',
        'fecha_fabricacion',
    ]; 

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }

    public function versionSd()
    {
        return $this->belongsTo(VersionSd::class);
    }

    public function versionUman()
    {
        return $this->belongsTo(VersionUman::class, 'uman_version_id');
    }

    public function pcbUman()
    {
        return $this->belongsTo(PcbUman::class);
    }

    public function ordenesFaena()
    {
        return $this->hasMany(OrdenFaena::class, 'uman_serial', 'serial');
    }

    public function ordenesLaboratorio()
        {
            return $this->hasMany(OrdenLaboratorio::class, 'equipo_uman_serial', 'serial')
                        ->orderByDesc('created_at');
        }

    public function getRouteKeyName()
    {
        return 'serial';
    }

}
