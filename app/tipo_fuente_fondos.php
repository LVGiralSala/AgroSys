<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_fuente_fondos extends Model
{
    protected $table = 'tipo_fuente_fondos';

    protected $fillable = [
    		'tipo_fuente_fondos'    		
    ];

    public function pn_origenes()
    {
        return $this->hasMany(pn_origen_fondos::class);
    }
}
