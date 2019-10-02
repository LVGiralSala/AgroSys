<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_cuenta_bancaria extends Model
{
    protected $table = 'tipo_cuenta_bancaria';

    protected $fillable = [
    		'tipo_cuenta_bancaria'    		
    ];

    public function pn_origenes()
    {
        return $this->hasMany(pn_origen_fondos::class);
    }
}
