<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    'serialUb',
    'estado',
    'tecnico',
    'faena',
    'falla',
    'descripcionFalla',
    'fechaIngreso',
    'detalleReparacion',
    'fechaReparacion',
    'hReparacion',
    'serialPcbUman',
    'serialUps',
    'versionRpi',
    'versionFirmware',
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
