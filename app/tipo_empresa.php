<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_empresa extends Model
{
    protected $table = 'tipo_empresa';

    protected $fillable = [
    		'tipo_empresa'    		
    ];

    public function pn_generales()
    {
        return $this->hasMany(persona_natural::class);
    }
}
