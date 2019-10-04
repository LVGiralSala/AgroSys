<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class ocupacion extends Model
{
    protected $table = 'ocupacion';

    protected $fillable = [
    		'ocupacion'    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}
