<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoUb extends Model
{
    protected $primaryKey = 'serialUb';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'serialUb',
        'estado',
        'versionUman',
        'versionraspberry',
        'versioUps',
        'PcbUman',
        'PcbAntena',
        'Radiometrix',
        'fechaFabricacion',
    ];

        public function orders()
    {
        return $this->hasMany(Order::class, 'serialUb', 'serialUb');
    }

}
