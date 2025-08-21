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
        'estado',
        'uman_version',
        'rpi_version',
        'ups_version',
        'pcb_uman',
        'pcb_antenna',
        'radiometrix',
        'timeserial',
        'fecha_fabricacion',
    ]; 

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function ordenesFaena()
    {
        return $this->hasMany(OrdenFaena::class, 'uman_serial', 'serial');
    }

    public function ordenesLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class, 'uman_serial', 'serial');
    }

    public function getRouteKeyName()
    {
        return 'serial';
    }

}
