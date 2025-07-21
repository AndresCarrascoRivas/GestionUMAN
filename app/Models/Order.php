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

    /* protected $table = 'orders'; */

    protected function falla(): Attribute
    {
        return Attribute::make(
            set: function($value){
                return strtolower($value);
            }
        );
            
    }
}
