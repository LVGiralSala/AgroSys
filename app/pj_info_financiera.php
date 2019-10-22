<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_info_financiera extends Model
{
    protected $table = 'pj_info_financiera';

    public $timestamps=false;
    
    protected $fillable = [
        'fecha_corte',
        'activos',
        'pasivos',
        'patrimonio',
        'ingr_operac_mensuales',
        'ingr_no_operac_mensuales',
        'egre_operac_mensuales',
        'egre_no_operac_mensuales',
        'util_perd_operacional',
        'util_perd_neta',
        'descrip_ingr_egre_no_operacionales',
        
        /**
         * Info Finan
         */
    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }
    
}
