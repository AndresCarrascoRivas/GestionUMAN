<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VersionUman extends Model
{
    protected $table = 'version_umans';

    protected $fillable = [
        'name',
        'descripcion',
        'url',
    ];

    public function equiposUman()
    {
        return $this->hasMany(EquipoUman::class);
    }

    public function OrdenesLaboratorio()
    {
        return $this->hasMany(OrdenLaboratorio::class);
    }
}
