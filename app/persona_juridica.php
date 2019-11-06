<?php

namespace AgroSys;

use Illuminate\Database\Eloquent\Model;

class persona_juridica extends Model
{
    protected $table = 'persona_juridica';

    public $timestamps=false;

    protected $fillable = [
        'dig_ver',
        'tipo_identificacion',
        'id_instrumento_financiero',
        'id_tipo_empresa',
        'id_ciudad_radc_doc',
        'id_depto_ofic_princ',
        'id_ciudad_ofic_princ',
        'id_depto_notificacion',
        'id_ciudad_notificacion',
        'id_ciudad_vinculacion',
        'id_tipo_vinculacion',
        'id_clase_vinculacion',
        'id_codigo_CIIU',
        'id_doc_constitucion',
        'id_info_trib_1',
        'id_info_trib_2',
        'id_info_trib_3',
        'id_origen_recursos',
        'id_estado_cliente',
        'id_estado_datos',
        'id_tipo_retenedor',
        'id_user',
        'id_trader',
        'fecha_radic_doc',
        'razon_social',
        'direccion_notificacion',
        'direccion_oficina_princ',
        'telefono_notificacion',
        'telefono_oficina_princ',
        'celular_oficina',
        'fax_oficina',
        'pagina_web',
        'doc_constitucion',
        'num_doc_constitucion',
        'origen_recursos',
        'tipo_empresa',
        'referencia',
        'lista_clinton',
        'lista_ONU',
        'fecha_diligenciameinto',
        'fecha_vinculacion',
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
    public function tipoEmpresa()
    {
        return $this->belongsTo(tipo_empresa::class,'id_tipo_empresa');
    }  
    public function ciiu()
    {
        return $this->belongsTo(ciiu::class,'id_codigo_CIIU');
    }  
    public function ciudadNotificacion()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_notificacion');
    }  
    public function ciudadOficPrinc()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_ofic_princ');
    }  
    public function ciudadRadcDoc()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_radc_doc');
    }  
    public function ciudadVinculacion()
    {
        return $this->belongsTo(ciudad::class,'id_ciudad_vinculacion');
    }  
    public function documentoConstitucion()
    {
        return $this->belongsTo(documento_constitucion::class,'id_doc_constitucion');
    }  
    public function estadoCliente()
    {
        return $this->belongsTo(estado_cliente::class,'id_estado_cliente');
    }  
    public function claseVinculacion()
    {
        return $this->belongsTo(clase_vinculacion::class,'id_clase_vinculacion');
    }  
    public function estadoDatos()
    {
        return $this->belongsTo(estado_datos::class,'id_estado_datos');
    }  
    public function instrumentoFinanciero()
    {
        return $this->belongsTo(instrumento_financiero::class,'id_instrumento_financiero');
    } 
    public function tipoIdentificacion()
    {
        return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion');
    }  
    public function tipoRetenedor()
    {
        return $this->belongsTo(tipo_retenedor::class,'id_tipo_retenedor');
    }  
    public function tipoVinculacion()
    {
        return $this->belongsTo(tipo_vinculacion::class,'id_tipo_vinculacion');
    }  
    public function users()
    {
        return $this->belongsTo(User::class,'id_user');
    }  
    public function origenRecursos()
    {
        return $this->belongsTo(origen_recursos::class,'id_origen_recursos');
    }  
    public function infoTributaria1()
    {
        return $this->belongsTo(info_tributaria::class,'id_info_trib_1');
    }  
    public function infoTributaria2()
    {
        return $this->belongsTo(info_tributaria::class,'id_info_trib_2');
    } 
    public function infoTributaria3()
    {
        return $this->belongsTo(info_tributaria::class,'id_info_trib_3');
    } 
   
}
