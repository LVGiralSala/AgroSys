<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class estado_cliente extends Model
{
    protected $table = 'estado_cliente';

    protected $fillable = [
    		'estado_cliente'    		
    ];

    public function pn_generales()
    {
        return $this->hasMany(persona_natural::class);
    }
}
