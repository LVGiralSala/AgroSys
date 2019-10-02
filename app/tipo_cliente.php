<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_cliente extends Model
{
    protected $table = 'tipo_cliente';

    protected $fillable = [
    		'tipo_cliente'    		
    ];

    public function pn_generales()
    {
        return $this->hasMany(persona_natural::class);
    }
}
