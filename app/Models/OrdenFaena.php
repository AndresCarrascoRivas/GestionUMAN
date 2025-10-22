<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenFaena extends Model
{
    protected $table = 'orden_faena';

    protected $fillable = [
        'tecnico_id',
        'faena_id',
        'fecha_trabajo',
        'equipo_minero',
        'estado',
        'uman_serial',
        'cambio_uman',
        'serial_nueva_uman',
        'falla',
        'descripcion_falla',
        'imagen'
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }

    public function tecnico()
    {
    return $this->belongsTo(Tecnico::class);
    }

    public function equipoOriginal()
    {
        return $this->belongsTo(EquipoUman::class, 'uman_serial', 'serial');
    }

    public function equipoReemplazo()
    {
        return $this->belongsTo(EquipoUman::class, 'serial_nueva_uman', 'serial');
    }

    public function equipoMinero()
    {
        return $this->belongsTo(EquipoMinero::class, 'equipo_minero', 'name');
    }

}
