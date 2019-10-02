<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pn_operaciones_moneda_extranjera extends Model
{
    protected $table = 'pn_operaciones_moneda_extranjera';

    public $timestamps=false;

    protected $fillable = [
        'cuentas_moneda_extranjera',
        'cuenta_compensacion',
        'id_tipo_transaccion',
        'entidad_cuenta_bancaria_me_1',
        'num_cuenta_bancaria_me_1',
        'ciudad_cuenta_bancaria_me_1',
        'pais_cuenta_bancaria_me_1',
        'id_tipo_moneda_me_1',
        'entidad_cuenta_bancaria_me_2',
        'num_cuenta_bancaria_me_2',
        'ciudad_cuenta_bancaria_me_2',
        'pais_cuenta_bancaria_me_2',
        'id_tipo_moneda_me_2',
        
        /**
         * Orperaciones Moneda Extranejera
         */
    ];

    public function pn_general()
    {
        return $this->belongsTo('App\persona_natural','id');
    }

    public function ciudad_me_1()
    {
        return $this->belongsTo(ciudad::class,'ciudad_cuenta_bancaria_me_1');
    }

    public function ciudad_me_2()
    {
        return $this->belongsTo(ciudad::class,'ciudad_cuenta_bancaria_me_2');
    }

    public function tipo_moneda_me1()
    {
        return $this->belongsTo(tipo_moneda::class,'id_tipo_moneda_me_1');
    }

    public function tipo_moneda_me2()
    {
        return $this->belongsTo(tipo_moneda::class,'id_tipo_moneda_me_2');
    }

    public function tipo_trans()
    {
        return $this->belongsTo(tipo_transaccion::class,'id_tipo_transaccion');
    }
}
