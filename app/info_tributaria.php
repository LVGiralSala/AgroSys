<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class info_tributaria extends Model
{
    protected $table = 'info_tributaria';

    protected $fillable = [
    		'informacion_tributaria'    		
    ];

    public function pj_general()
    {
        return $this->hasMany(persona_juridica::class);
    }
}
