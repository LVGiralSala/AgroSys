<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class estado_datos extends Model
{
    protected $table = 'estado_datos';

    protected $fillable = [
    		'estado_datos'    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}

