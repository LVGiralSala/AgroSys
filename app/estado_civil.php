<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class estado_civil extends Model
{
    protected $table = 'estado_civil';

    protected $fillable = [
    		'estado_civil'    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}
