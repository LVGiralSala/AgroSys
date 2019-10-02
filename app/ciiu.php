<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class ciiu extends Model
{
    protected $table = 'ciiu';

    protected $fillable = [
    		'tipo'    		
    ];

    public function pn_financieras()
    {
        return $this->hasMany(pn_info_financiera::class);
    }
}
