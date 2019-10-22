<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_origen_fondos extends Model
{
    protected $table = 'pj_origen_fondos';

    public $timestamps=false;

    protected $fillable = [
        'id_entidad_cuenta_bancaria_1',
        'id_entidad_cuenta_bancaria_2',
        'id_tipo_cuenta_bancaria_1',
        'id_tipo_cuenta_bancaria_2',
        'detalle_actividad_negocio',
        'entidad_referencia_comercial',
        'direccion_referencia_comercial',
        'telefono_referencia_comercial',
        'num_cuenta_bancaria_1',
        'num_cuenta_bancaria_2',
        
        /**
         * Origen Fondos
         */
    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }

    public function entidad_bancaria1()
    {
        return $this->belongsTo(entidad_bancaria::class,'id_entidad_cuenta_bancaria_1');
    }

    public function entidad_bancaria2()
    {
        return $this->belongsTo(entidad_bancaria::class,'id_entidad_cuenta_bancaria_2');
    }

    public function tipo_cuenta1()
    {
        return $this->belongsTo(tipo_cuenta_bancaria::class,'id_tipo_cuenta_bancaria_1');
    }

    public function tipo_cuenta2()
    {
        return $this->belongsTo(tipo_cuenta_bancaria::class,'id_tipo_cuenta_bancaria_2');
    }
}
