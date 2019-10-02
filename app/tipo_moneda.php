<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_moneda extends Model
{
    protected $table = 'tipo_moneda';

    protected $fillable = [
    		'tipo_moneda'    		
    ];

    public function pn_me_operaciones()
    {
        return $this->hasMany(pn_operaciones_moneda_extranjera::class);
    }
}
