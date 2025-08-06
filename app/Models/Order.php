<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'fechaReparacion'
    ];

    protected $fillable = [
    'serialUb',
    'serialTms',
    'serialUps',
    'versionRpi',
    'versionFirmware',
    'tecnico',
    'faena',
    'falla',
    'descripcionFalla',
    'DetalleReparacion',
    'fechaIngreso',
    'fechaReparacion',
    'hReparacion',
];

    /* protected $table = 'orders'; */

    protected function falla(): Attribute
    {
        return Attribute::make(
            set: function($value){
                return strtolower($value);
            }
        );
            
    }

    public function equipoUb()
{
    return $this->belongsTo(EquipoUb::class, 'serialUb', 'serialUb');
}

}
