<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoMinero extends Model
{
    protected $table = 'equipo_minero';

    protected $fillable = [
        'name',
        'modelo',
        'tipo',
        'faena_id',
        'uman_serial',
        'posicion_equipo_uman',
        'dcdc',
        'puesta_tierra',
        'antena_rf_mt',
        'antena_gps_mt',
        'hmi_mt',
        'cable_alimentacion_mt',
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }

    public function ordenFaena()
    {
        return $this->hasMany(OrdenFaena::class);
    }

    public function ordenLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class);
    }

    public function checkFaena()
    {
        return $this->hasMany(CheckFaena::class);
    }
}
