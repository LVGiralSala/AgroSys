<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pn_info_financiera extends Model
{
    protected $table = 'pn_info_financiera';

    public $timestamps=false;
    
    protected $fillable = [
        'id_detalle_actividad',
        'id_tipo_regimen',
        'id_codigo_CIIU',
        'activos',
        'pasivos',
        'patrimonio',
        'ingresos_mensuales',
        'egresos_mensuales',
        'otros_ingresos',
        'detalle_otros_ingresos',
        'otros_egresos',
        'detalle_otros_egresos',
        'explicacion_actividad',
        'declaracion_renta',
        
        /**
         * Info Finan
         */
    ];

    public function pn_general()
    {
        return $this->belongsTo('App\persona_natural','id');
    }
    
    public function detalle_actividad()
    {
        return $this->belongsTo(detalle_actividad::class,'id_detalle_actividad');
    }
    
    public function tipo_regimen()
    {
        return $this->belongsTo(tipo_regimen::class,'id_tipo_regimen');
    }
    
    public function ciiu()
    {
        return $this->belongsTo(ciiu::class,'id_codigo_CIIU');
    }
}
