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
            'id_doc_contitucion'=>'required',
            'doc_constitucion'=>'required',
            'num_doc_constitucion'=>'required',
            'fecha_radic_doc'=>'required',
            'id_ciudad_radc_doc'=>'required',
            'id_info_trib_1'=>'required',
            // 'id_info_trib_2'=>'required',
            // 'id_info_trib_3'=>'required',
            'id_origen_recursos'=>'required',
            'origen_recursos'=>'required',
            'id_tipo_empresa'=>'required',
            'tipo_empresa'=>'required',
            'id_codigo_CIIU'=>'required',
            'id_instrumento_financiero'=>'required',
            'fecha_vinculacion'=>'required',
            'id_ciudad_vinculacion'=>'required',
            'id_tipo_vinculacion'=>'required',
            'id_clase_vinculacion'=>'required',
            // 'id_rep_legales_ordenantes'=>'required',
            // 'id_trader'=>'required',
            // 'id_user'=>'required',
            // 'lista_clinton'=>'required',
            // 'lista_ONU'=>'required',
            // 'fecha_actualizacion'=>'required',
            // 'fecha_diligenciameinto'=>'required',
            // ''=>'required',
        ];
    }
}
