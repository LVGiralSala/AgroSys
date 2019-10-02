<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pn_ordenantes extends Model
{
    protected $table = 'pn_ordenante';

    public $timestamps=false;

    protected $fillable = [
        'nombres_ordenante_1',
        'apellidos_ordenante_1',
        'tipo_identificacion_ordenante_1',
        'num_identificacion_ordenante_1',
        'direccion_ordenante_1',
        'telefono_ordenante_1',
        'parentesco_ordenante_1',
        'id_calidad_ordenante_1',
        'nombres_ordenante_2',
        'apellidos_ordenante_2',
        'tipo_identificacion_ordenante_2',
        'num_identificacion_ordenante_2',
        'direccion_ordenante_2',
        'telefono_ordenante_2',
        'parentesco_ordenante_2',
        'id_calidad_ordenante_2',
        /**
         * Ordenantes
         */
    ];

    public function pn_general()
    {
        return $this->belongsTo('App\persona_natural','id');
    }

    public function calidad_ordenante1()
    {
        return $this->belongsTo(persona_natural::class,'id_calidad_ordenante_1');
    }

    public function calidad_ordenante2()
    {
        return $this->belongsTo(persona_natural::class,'id_calidad_ordenante_2');
    }

    public function tipo_identificacion1()
    {
        return $this->belongsTo(persona_natural::class,'tipo_identificacion_ordenante_1');
    }

    public function tipo_identificacion2()
    {
        return $this->belongsTo(persona_natural::class,'tipo_identificacion_ordenante_2');
    }
}
