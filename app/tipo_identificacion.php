<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_identificacion extends Model
{
    protected $table = 'tipo_identificacion';

    protected $fillable = [
    		'tipo_identificacion'    		
    ];

    public function pn_generales()
    {
        return $this->hasMany(persona_natural::class);
    }

    public function pn_ordenantes()
    {
        return $this->hasMany(pn_ordenantes::class);
    }
}
