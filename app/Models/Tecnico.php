<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnicos';

    protected $fillable = [
        'name',
        'faena_id',
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }
    
    public function ordenesLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class);
    }

    public function checkFaena()
    {
        return $this->hasMany(CheckFaena::class);
    }

}
