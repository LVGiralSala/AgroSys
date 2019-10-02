<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class detalle_actividad extends Model
{
    protected $table = 'detalle_actividad';

    protected $fillable = [
    		'detalle_actividad'    		
    ];

    public function pn_financieras()
    {
        return $this->hasMany(pn_info_financiera::class);
    }
}
