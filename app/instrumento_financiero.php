<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class instrumento_financiero extends Model
{
    protected $table = 'instrumento_financiero';

    protected $fillable = [
    		'instrumento_financiero'    		
    ];

    public function pn_general()
    {
        return $this->hasMany(persona_natural::class);
    }
}
