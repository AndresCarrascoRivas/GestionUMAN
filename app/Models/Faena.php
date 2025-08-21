<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faena extends Model
{
    protected $table = 'faenas';

    protected $fillable = ['name'];

    public function ordenesFaena()
    {
        return $this->hasMany(OrdenFaena::class);
    }

    public function ordenesLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class);
    }

}
