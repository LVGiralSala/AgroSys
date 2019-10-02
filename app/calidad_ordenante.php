<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class calidad_ordenante extends Model
{
    protected $table = 'calidad_ordenante';

    protected $fillable = [
    		'calidad_ordenante'    		
    ];

    public function pn_ordenantes()
    {
        return $this->hasMany(pn_ordenantes::class);
    }
}
