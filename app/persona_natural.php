<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class persona_natural extends Model
{
    protected $table = 'persona_natural';

    public $timestamps=false;

protected $fillable = [
        'id_tipo_persona',
        'id_ciudad_vinculacion',
        'id_tipo_vinculacion',
        'fecha_vinculacion',
        'id_clase_vinculacion',	
        'id_instrumento_financiero',
        'tipo_identificacion',	
        'id_ciudad_trabajo',
        'id_genero',      
        'lugar_exp_doc',
        'id_ciudad_residencia',
        'id_estado_civil',   
        'id_tipo_cliente', 
        'id_ocupacion',
        'id_tipo_empresa',
        'id_estado_cliente',
        'id_estado_datos', 
        'id_user',
        'id_trader',    
        'fecha_diligenciamiento',	
        'fecha_exp_doc',
        'nombres',		
        'apellidos',	
        'direccion_residencia',	
        'telefono',    
        'celular',    
        'email', 
        'lista_ONU',    
        'lista_clinton',    
        'empresa_trabajo',
        'cargo_desempenio',
        'direccion_oficina',
        'telefono_oficina',
        'vinculo_func_agrobolsa',
        'nombre_vinc_func_agrobolsa',
        'persona_expuesta_publicamente',
        'desc_pers_recon_public',
        'cargo_publico_reciente',
        'nombre_cargo_publico',
        'institucion_cargo_publico',
        'manejo_recursos_publicos',
        'observacion',
        'fecha_actualizacion', 
        
        /**
         * Info Básica
         */
        
        			];


protected $guarded =[


                    ];
/**
* Llaves foraneas
*/                   
    public function ciudadVinculacion()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_vinculacion');
    }

    public function ciudadExpDoc()
    {
        return $this->belongsTo(ciudad::class,'lugar_exp_doc');
    }

    public function ciudadResidencia()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_residencia');
    }

    public function ciudadTrabajo()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_trabajo');
    }

    public function claseVinculacion()
    {
        return $this->belongsTo(clase_vinculacion::class,'id_clase_vinculacion');
    }

    public function estado_civil()
    {
        return $this->belongsTo(estado_civil::class,'id_estado_civil');
    }

    public function estado_cliente()
    {
        return $this->belongsTo(estado_cliente::class,'id_estado_cliente');
    }

    public function estado_datos()
    {
        return $this->belongsTo(estado_datos::class,'id_estado_datos');
    }

    public function genero()
    {
        return $this->belongsTo(genero::class,'id_genero');
    }

    public function instrumento_financiero()
    {
        return $this->belongsTo(instrumento_financiero::class,'id_instrumento_financiero');
    }

    public function tipo_cliente()
    {
        return $this->belongsTo(tipo_cliente::class,'id_tipo_cliente');
    }

    public function tipo_empresa()
    {
        return $this->belongsTo(tipo_empresa::class,'id_tipo_empresa');
    }

    public function tipo_identificacion()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion');
    }

    public function tipo_persona()
    {
        return $this->belongsTo(tipo_persona::class,'id_tipo_persona');
    }

    public function tipo_vinculaciona()
    {
        return $this->belongsTo(tipo_persona::class,'id_tipo_vinculacion');
    }

    public function ocupacion()
    {
        return $this->belongsTo(ocupacion::class,'id_ocupacion');
    }

    public function origen_fondo()
    {
        return $this->belongsTo('App\pn_origen_fondos','id');
    }

    public function ordenante()
    {
        return $this->belongsTo('App\pn_origen_fondos','id');
    }

    public function operacion_extranjera()
    {
        return $this->belongsTo('App\pn_origen_fondos','id');
    }

    public function declaracion_facta()
    {
        return $this->belongsTo('App\pn_declaraciones_facta','id');
    }

    public function declaracion_crs()
    {
        return $this->belongsTo('App\pn_declaraciones_crs','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
