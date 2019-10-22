<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class origen_recursos extends Model
{
    protected $table = 'origen_recursos';

    protected $fillable = [
    		'origen_recursos'    		
    ];

    public function pj_general()
    {
        return $this->hasMany(persona_juridica::class);
    }
}
