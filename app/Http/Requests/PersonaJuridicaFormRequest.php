<?php

namespace AgroSys\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaJuridicaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'num_identificacion'=>'required',
            'razon_social'=>'required',
            'dig_ver'=>'required',
            'direccion_notificacion'=>'required',
            'id_depto_notificacion'=>'required',
            'id_ciudad_notificacion'=>'required',
            'telefono_notificacion'=>'required',
            'direccion_oficina_princ'=>'required',
            'id_depto_ofic_princ'=>'required',
            'id_ciudad_ofic_princ'=>'required',
            'telefono_oficina_princ'=>'required',
            'pagina_web'=>'required',
            'fax_oficina'=>'required',
            'referencia'=>'required',
            'id_doc_constitucion'=>'required',
            'num_doc_constitucion'=>'required',
            'fecha_radic_doc'=>'required',
            'id_ciudad_radc_doc'=>'required',
            'id_info_trib_1'=>'required',

            
            'id_origen_recursos'=>'required',
            'id_tipo_empresa'=>'required',
            'id_codigo_CIIU'=>'required',
            'id_instrumento_financiero'=>'required',
            'fecha_vinculacion'=>'required',
            'id_ciudad_vinculacion'=>'required',
            'id_tipo_vinculacion'=>'required',
            'id_clase_vinculacion'=>'required',

            // No
            // 'num_ident_rep_legales_ordenantes'=>'required',
            // 'id_trader'=>'required',
            // 'id_user'=>'required',
            // 'lista_clinton'=>'required',
            // 'lista_ONU'=>'required',
            // 'fecha_actualizacion'=>'required',
            // 'fecha_diligenciameinto'=>'required',
            // ''=>'required',

            /**
             * Info Básica
             * */ 

            /**
             * Representante Legal
             * */ 
            'tipo_identificacion'=>'required',
            'num_identificacion_rep_legal'=>'required',
            'lugar_exp_doc'=>'required',
            'lugar_nacimiento'=>'required',
            'fecha_nacimiento'=>'required',
            'fecha_exp_doc'=>'required',
            'apellidos'=>'required',
            'nombres'=>'required',
            'ciudad_residencia'=>'required',
            'direccion_residencia'=>'required',
            'telefono'=>'required',
            'celular'=>'required',
            'email'=>'required',
            'vinculo_func_agrobolsa'=>'required',
            'persona_expuesta_publicamente'=>'required',
            'cargo_publico_reciente'=>'required',
            'manejo_recursos_publicos'=>'required',
             /**
             * Representante Legal
             * */ 


             /**
             * Info Financiera
             * */ 
            'fecha_corte'=>'required',
            'activos'=>'required',
            'pasivos'=>'required',

            // 'patrimonio'=>'required',

            'ingr_operac_mensuales'=>'required',
            'ingr_no_operac_mensuales'=>'required',
            'egre_operac_mensuales'=>'required',
            'egre_no_operac_mensuales'=>'required',
            'util_perd_operacional'=>'required',
            'util_perd_neta'=>'required',
            'descrip_ingr_egre_no_operacionales'=>'required',
            /**
            * Info Financiera
            * */

             /**
             * Origen de Fondos
             * */ 
            'detalle_actividad_negocio'=>'required',
            'entidad_referencia_comercial'=>'required',
            'direccion_referencia_comercial'=>'required',
            'telefono_referencia_comercial'=>'required',
            'id_entidad_cuenta_bancaria_1'=>'required',
            'num_cuenta_bancaria_1'=>'required',
            'id_tipo_cuenta_bancaria_1'=>'required',
             /**
             * Origen de Fondos
             * */ 

             /**
             * ME
             * */ 
            'cuentas_moneda_extranjera'=>'required',
            'cuenta_compensacion'=>'required',
            'ciudad_cuenta_bancaria_me_1'=>'required',
            'pais_cuenta_bancaria_me_1'=>'required',
            'id_tipo_moneda_me_1'=>'required',
            'id_tipo_transaccion_1'=>'required',
             /**
             * ME
             * */ 

             /**
             * FACTA
             * */ 
            'obligaciones_tributarias_EEUU_US'=>'required',
             /**
             * FACTA
             * */ 

             /**
             * CRS
             * */ 
            'obligaciones_fiscales_otros_paises'=>'required',
             /**
             * CRS
             * */ 

             /**
             * Ordenantes
             * */ 
            'nombres_ordenante_1'=>'required',
            'apellidos_ordenante_1'=>'required',
            'tipo_identificacion_ordenante_1'=>'required',
            'num_identificacion_ordenante_1'=>'required',
            'telefono_ordenante_1'=>'required',
            'direccion_ordenante_1'=>'required',
             /**
             * Ordenantes
             * */ 

             /**
             * Accionistas
             * */ 
            'tipo_identificacion_accionista_1'=>'required',
            'num_identificacion_accionista_1'=>'required',
            'nombre_completo_accionista_1'=>'required',
            'admin_recursos_publicos_accionista_1'=>'required',
            'ejerce_poder_publico_accionista_1'=>'required',
            'reconocimiento_publico_accionista_1'=>'required',
            'id_pais_declaracion_tributaria_accionista_1'=>'required',
            'porc_participacion_accionista_1'=>'required',
             /**
             * Accionistas
             * */ 
        ];
    }
}
