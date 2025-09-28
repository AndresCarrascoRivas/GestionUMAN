<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoMinero extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'equipo_minero';

    protected $fillable = [
        'name',
        'faena_id',
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }
}
