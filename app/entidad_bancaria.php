<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class entidad_bancaria extends Model
{
    protected $table = 'entidad_bancaria';

    protected $fillable = [
    		'entidad_bancaria'    		
    ];

    public function pn_origenes()
    {
        return $this->hasMany(pn_origen_fondos::class);
    }
}
