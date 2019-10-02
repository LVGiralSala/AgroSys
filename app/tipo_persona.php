<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_persona extends Model
{
    protected $table = 'tipo_persona';

    protected $fillable = [
    		'tipo_persona'    		
    ];

    public function pn_generales()
    {
        return $this->hasMany(persona_natural::class);
    }
}
