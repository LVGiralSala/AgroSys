<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class clase_vinculacion extends Model
{
    protected $table = 'clase_vinculacion';

    protected $fillable = [
    		'clase_vinculacion'    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}
