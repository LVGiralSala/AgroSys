<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    protected $table = 'genero';

    protected $fillable = [
    		'genero'    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}
