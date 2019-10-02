<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class tipo_regimen extends Model
{
    protected $table = 'tipo_regimen';

    protected $fillable = [
    		'tipo_regimen'    		
    ];

    public function pn_financieras()
    {
        return $this->hasMany(pn_info_financiera::class);
    }
}
