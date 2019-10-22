<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class documento_constitucion extends Model
{
    protected $table = 'documento_constitucion';

    protected $fillable = [
    		'documento_constitucion'    		
    ];

    public function pj_general()
    {
        return $this->hasMany(persona_juridica::class);
    }
}
