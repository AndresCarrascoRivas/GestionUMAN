<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcbUman extends Model
{
    protected $table = 'pcb_umans';

    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $fillable = [
        'name',
        'descripcion',
    ];

    public function equiposUman()
    {
        return $this->hasMany(EquipoUman::class);
    }

    public function ordenesLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class);
    }
}
