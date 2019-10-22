<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_declaracion_facta extends Model
{
    protected $table = 'pj_declaracion_fatca';

    public $timestamps=false;
    
    protected $fillable = [
        'obligaciones_tributarias_EEUU_US',
        'num_TIN_equivalente',
        'especificacion_obligaciones_tributarias'
        
         /**
         * Declaraciones FACTA
         */
    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }
}
