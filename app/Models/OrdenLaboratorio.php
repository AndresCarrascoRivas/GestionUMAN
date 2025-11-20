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
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }
    
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function equipoUMAN()
    {
        return $this->belongsTo(EquipoUman::class, 'equipo_uman_serial', 'serial');
    }

    public function equipoMinero()
    {
        return $this->belongsTo(EquipoMinero::class, 'equipo_minero_id');
    }

}
