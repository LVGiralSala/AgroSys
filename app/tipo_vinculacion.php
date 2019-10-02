<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_vinculacion extends Model
{
    protected $table = 'tipo_vinculacion';

    protected $fillable = [
    		'tipo_vinculacion'    		
    ];

    public function pn_generales()
    {
        return $this->hasMany(persona_natural::class);
    }
}
