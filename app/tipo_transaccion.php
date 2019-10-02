<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_transaccion extends Model
{
    protected $table = 'tipo_transaccion';

    protected $fillable = [
    		'tipo_transaccion'    		
    ];

    public function pn_me_operaciones()
    {
        return $this->hasMany(pn_operaciones_moneda_extranjera::class);
    }
}
