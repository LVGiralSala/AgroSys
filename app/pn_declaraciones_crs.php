<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pn_declaraciones_crs extends Model
{
    protected $table = 'pn_declaracion_crs';

    public $timestamps=false;
    
    protected $fillable = [
        'obligaciones_fiscales_otros_paises',
        'especificacion_obligaciones_fiscales',
        'id_pais_obligaciones_fiscales',
        'num_identificacion_fiscal_equivalente',
        
         /**
         * Declaraciones CRS
         */
    ];

    public function pn_general()
    {
        return $this->belongsTo('App\persona_natural','id');
    }
}
