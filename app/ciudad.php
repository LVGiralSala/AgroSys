<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
    protected $table = 'ciudad';

    protected $fillable = [
            'nombre_ciudad',
            'cod_depto',
            'cod_ciudad',
            'cod_pais',    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}
