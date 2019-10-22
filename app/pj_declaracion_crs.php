<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_declaracion_crs extends Model
{
    protected $table = 'pj_declaracion_crs';

    public $timestamps=false;
    
    protected $fillable = [
        'id_pais_obligaciones_fiscales',
        'obligaciones_fiscales_otros_paises',
        'especificacion_obligaciones_fiscales',
        'num_identificacion_fiscal_equivalente',
        
         /**
         * Declaraciones CRS
         */
    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }
}
