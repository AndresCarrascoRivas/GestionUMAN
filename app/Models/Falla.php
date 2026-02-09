<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falla extends Model
{
    protected $table = 'fallas';

    protected $fillable = [
        'name',
        'descripcion',
    ];

    public function ordenesLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class);
    }

    public function ordenesfaena()
    {
        return $this->hasMany(OrdenFaena::class);
    }

}
