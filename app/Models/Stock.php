<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [
        'faena_id',
        'serial',
        'cantidad',
        'fecha_ingreso',
        'fecha_egreso'
    ];

    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }

    public function equipo()
    {
        return $this->belongsTo(EquipoUman::class, 'serial', 'serial');
    }

}
