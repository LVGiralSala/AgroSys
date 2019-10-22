<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_retenedor extends Model
{
    protected $table = 'tipo_retenedor';

    protected $fillable = [
    		'tipo_retenedor'    		
    ];

    public function pj_general()
    {
        return $this->hasMany(persona_juridica::class);
    }
}
