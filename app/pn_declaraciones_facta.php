<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pn_declaraciones_facta extends Model
{
    protected $table = 'pn_declaracion_fatca';

    public $timestamps=false;
    
    protected $fillable = [
        'obligaciones_tributarias_EEUU_US',
        'num_TIN_equivalente',
        'especificacion_obligaciones_tributarias'
        
         /**
         * Declaraciones FACTA
         */
    ];

    public function pn_general()
    {
        return $this->belongsTo('App\persona_natural','id');
    }
}
