<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class conexion extends Model
{
    protected $table = 'conexion';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'faena_id',
        'tipo',
        'ip',
        'gateway',
        'netmask',
        'operador',
        'apn',
        'apn_user',
        'apn_pass',
    ];

    // Casts para asegurar tipos correctos
    protected $casts = [
        'faena_id' => 'integer',
        'ip'       => 'string',
        'gateway'  => 'string',
        'netmask'  => 'string',
        'operador' => 'string',
        'apn'      => 'string',
        'apn_user' => 'string',
        'apn_pass' => 'string',
    ];

    // Relación: una conexión pertenece a una faena
    public function faena()
    {
        return $this->belongsTo(Faena::class);
    }
}
