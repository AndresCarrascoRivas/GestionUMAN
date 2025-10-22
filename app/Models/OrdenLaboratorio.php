<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenLaboratorio extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'orden_laboratorio';

    protected $fillable = [
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
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }
    
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function equipo()
    {
    return $this->belongsTo(EquipoUman::class, 'uman_serial', 'serial');
    }

    public function equipoMinero()
    {
        return $this->belongsTo(EquipoMinero::class, 'equipo_minero');
    }

}
