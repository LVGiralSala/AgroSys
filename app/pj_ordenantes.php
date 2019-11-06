<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_ordenantes extends Model
{
    protected $table = 'pj_ordenante';

    public $timestamps=false;

    protected $fillable = [
        'tipo_identificacion_ordenante_1',
        'tipo_identificacion_ordenante_2',
        'nombres_ordenante_1',
        'apellidos_ordenante_1',
        'num_identificacion_ordenante_1',
        'direccion_ordenante_1',
        'telefono_ordenante_1',
        'nombres_ordenante_2',
        'apellidos_ordenante_2',
        'num_identificacion_ordenante_2',
        'direccion_ordenante_2',
        'telefono_ordenante_2',
        /**
         * Ordenantes
         */
    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }

    public function tipo_identificacion1()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_ordenante_1');
    }

    public function tipo_identificacion2()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_ordenante_2');
    }
}
