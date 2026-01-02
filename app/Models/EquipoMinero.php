<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoMinero extends Model
{
    protected $table = 'equipo_minero';

    protected $fillable = [
        'name',
        'faena_id',
        'antena_rf',
        'antena_gps',
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
