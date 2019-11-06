<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class pj_representante_legal extends Model
{
    protected $table = 'pj_representante_legal';

    public $timestamps=false;

    protected $fillable = [
        'tipo_identificacion',
        'lugar_exp_doc',
        'lugar_nacimiento',
        'ciudad_residencia',
        'fecha_nacimiento',
        'fecha_exp_doc',
        'apellidos',
        'nombres',
        'vinculo_func_agrobolsa',
        'nombre_vinc_func_agrobolsa',
        'direccion_residencia',
        'telefono',
        'celular',
        'email',
        'persona_expuesta_publicamente',
        'desc_pers_recon_public',
        'cargo_publico_reciente',
        'nombre_cargo_publico',
        'institucion_cargo_publico',
        'manejo_recursos_publicos',
        
        /**
         * Origen Fondos
         */
    ];

    public function pj_general()
    {
        return $this->belongsTo('App\persona_juridica','id');
    }

    public function tipo_identificacion()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion');
    }

    public function ciudad_exp_doc()
    {
        return $this->belongsTo(ciudad::class,'lugar_exp_doc');
    }

    public function ciudad_residencia()
    {
        return $this->belongsTo(ciudad::class,'ciudad_residencia');
    }

    public function ciudad_nacimiento()
    {
        return $this->belongsTo(ciudad::class,'lugar_nacimiento');
    }

}
