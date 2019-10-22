<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_accionista extends Model
{
    protected $table = 'pj_accionista';

    public $timestamps=false;

    protected $fillable = [
        'tipo_identificacion_accionista_1',
        'tipo_identificacion_accionista_2',
        'tipo_identificacion_accionista_3',
        'tipo_identificacion_accionista_4',
        'tipo_identificacion_accionista_5',
        'id_pais_declaracion_tributaria_accionista_1',
        'id_pais_declaracion_tributaria_accionista_2',
        'id_pais_declaracion_tributaria_accionista_3',
        'id_pais_declaracion_tributaria_accionista_4',
        'id_pais_declaracion_tributaria_accionista_5',
        'num_identificacion_accionista_1',
        'nombre_completo_accionista_1',
        'admin_recursos_publicos_accionista_1',
        'ejerce_poder_publico_accionista_1',
        'reconocimiento_publico_accionista_1',
        'porc_participacion_accionista_1',
        'num_identificacion_accionista_2',
        'nombre_completo_accionista_2',
        'admin_recursos_publicos_accionista_2',
        'ejerce_poder_publico_accionista_2',
        'reconocimiento_publico_accionista_2',
        'porc_participacion_accionista_2',
        'num_identificacion_accionista_3',
        'nombre_completo_accionista_3',
        'admin_recursos_publicos_accionista_3',
        'ejerce_poder_publico_accionista_3',
        'reconocimiento_publico_accionista_3',
        'porc_participacion_accionista_3',
        'num_identificacion_accionista_4',
        'nombre_completo_accionista_4',
        'admin_recursos_publicos_accionista_4',
        'ejerce_poder_publico_accionista_4',
        'reconocimiento_publico_accionista_4',
        'porc_participacion_accionista_4',
        'num_identificacion_accionista_5',
        'nombre_completo_accionista_5',
        'admin_recursos_publicos_accionista_5',
        'ejerce_poder_publico_accionista_5',
        'reconocimiento_publico_accionista_5',
        'porc_participacion_accionista_5',
    ];

    protected $guarded =[


    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }

    public function tipo_identificacion_accionista_1()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_accionista_1');
    }

    public function tipo_identificacion_accionista_2()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_accionista_2');
    }

    public function tipo_identificacion_accionista_3()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_accionista_3');
    }

    public function tipo_identificacion_accionista_4()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_accionista_4');
    }

    public function tipo_identificacion_accionista_5()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_accionista_5');
    }
}
