<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VersionSd extends Model
{
    protected $table = 'version_sds';

    protected $fillable = [
        'version',
        'descripcion',
    ];

    public function equiposUman()
    {
        return $this->hasMany(EquipoUman::class);
    }
    
}
