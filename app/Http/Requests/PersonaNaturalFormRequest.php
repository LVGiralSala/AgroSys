<?php

namespace AgroSys\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaNaturalFormRequest extends FormRequest
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
            'tipo_identificacion'=>'required',
            'num_identificacion'=>'required',
            'lugar_exp_doc'=>'required',
            'fecha_exp_doc'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'id_genero'=>'required',
            'id_estado_civil'=>'required',
            'direccion_residencia'=>'required',
            'celular'=>'required',
            'email'=>'required',
            'id_ciudad_vinculacion'=>'required',
            'id_tipo_vinculacion'=>'required',
            'id_clase_vinculacion'=>'required',
            'id_ocupacion'=>'required',
            'fecha_vinculacion'=>'required',
            // 'fecha_diligenciamiento'=>'required',
            // 'id_user'=>'required',
            // 'lista_clinton'=>'required',
            // 'lista_ONU'=>'required',
            // 'id_trader'=>'required',
            // 'id_estado_cliente'=>'required',
            // 'fecha_actualizacion'=>'required',

            /**
             * info_financiera 
             * */ 
            'activos'=>'required',
            'pasivos'=>'required',
            // 'patrimonio'=>'required',
            'ingresos_mensuales'=>'required',
            'egresos_mensuales'=>'required',
            // 'otros_ingr'=>'required',
            // 'otros_egr'=>'required',
            // 'detalle_otros_ingr'=>'required',
            // 'detalle_otros_egr'=>'required',
            'id_detalle_actividad'=>'required',
            // 'explicacion_actividad'=>'required',
            'id_tipo_regimen'=>'required',
            'id_codigo_CIIU'=>'required',
            // 'actividad_economica'=>'required',
            'declaracion_renta'=>'required',

            /**
             * origen fondos
             * */ 
            'id_tipo_fuente_fondos'=>'required',
            'entidad_referencia_comercial'=>'required',
            'direccion_referencia_comercial'=>'required',
            'telefono_referencia_comercial'=>'required',
            'id_entidad_cuenta_bancaria_1'=>'required',
            'num_cuenta_bancaria_1'=>'required',
            'id_tipo_cuenta_bancaria_1'=>'required',
            // 'entidad_cuenta_bancaria_2'=>'required',
            // 'num_cuenta_bancaria_2'=>'required',
            // 'id_tipo_cuenta_bancaria_2'=>'required',

            /**
             * operaciones moneda extranjera
             * */ 
            'cuentas_moneda_extranjera'=>'required',
            'cuenta_compensacion'=>'required',
            // 'entidad_cuenta_bancaria_1'=>'required',
            // 'cuentas_moneda_extranjera'=>'required',
            // 'cuenta_compensacion'=>'required',
            // 'id_entidad_cuenta_bancaria_1'=>'required',
            // 'num_cuenta_bancaria_1'=>'required',
            // 'ciudad_cuenta_bancaria_1'=>'required',
            // 'pais_cuenta_bancaria_1'=>'required',
            // 'id_tipo_moneda_1'=>'required',
            // 'id_tipo_transaccion'=>'required',

            /**
             * declaraciones facta/crs
             * */ 
            'obligaciones_tributarias_EEUU_US'=>'required',
            // 'num_TIN_equivalente'=>'required',
            'obligaciones_fiscales_otros_paises'=>'required',
            // 'especificacion_obligaciones_tributarias',

            /**
             * ordenantes y apoderados
             * */ 
            'nombres_ordenante_1'=>'required',
            'apellidos_ordenante_1'=>'required',
            'direccion_ordenante_1'=>'required',
            'telefono_ordenante_1'=>'required',
            'parentesco_ordenante_1'=>'required',
            'tipo_identificacion_ordenante_1'=>'required',
            'num_identificacion_ordenante_1'=>'required',
            'id_calidad_ordenante_1'=>'required',

        ];
    }
}
