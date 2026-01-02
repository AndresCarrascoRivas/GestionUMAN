<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckFaena extends Model
{
       protected $fillable = [
        'tecnico_id',
        'faena_id',
        'equipo_minero_id',
        'fecha_ingreso',
        'caja_uman',
        'hmi',
        'antena_rf',
        'antena_gps',
        'conexion_electrica',
        'sensores_internos',
        'observacion',
    ];

        public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }

    public function equipoMinero()
    {
        return $this->belongsTo(EquipoMinero::class);
    }
}
