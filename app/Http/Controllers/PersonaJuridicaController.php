<?php

namespace AgroSys\Http\Controllers;

use AgroSys\Http\Requests\PersonaJuridicaFormRequest;
use AgroSys\persona_juridica;
use AgroSys\pj_accionista;
use AgroSys\pj_declaracion_crs;
use AgroSys\pj_declaracion_facta;
use AgroSys\pj_info_financiera;
use AgroSys\pj_operaciones_moneda_extranjera;
use AgroSys\pj_ordenantes;
use AgroSys\pj_origen_fondos;
use AgroSys\pj_representante_legal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class PersonaJuridicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $now=Carbon::now();
        if($request)
        {
            $query=trim($request->get('searchText'));
            $personas_juridicas=DB::table('persona_juridica as pj')
            ->join('tipo_identificacion as ti', 'pj.tipo_identificacion', '=','ti.id')
            ->join('instrumento_financiero as if', 'pj.id_instrumento_financiero', '=','if.id')
            ->join('tipo_vinculacion as tv', 'pj.id_tipo_vinculacion', '=','tv.id')
            ->join('clase_vinculacion as cv', 'pj.id_clase_vinculacion', '=','cv.id')
            ->join('ciiu as ciiu', 'pj.id_codigo_CIIU', '=','ciiu.id')
            ->select('pj.id','ti.sigla','pj.dig_ver','pj.razon_social','pj.pagina_web','pj.lista_clinton','pj.lista_ONU',
                     'cv.clase_vinculacion as id_clase_vinculacion','tv.tipo_vinculacion as id_tipo_vinculacion',
                     'if.instrumento_financiero as id_instrumento_financiero', 'pj.id_codigo_CIIU')
            ->where('pj.id','LIKE','%'.$query.'%')->get();

            return view('persona.juridica.index',["personas_juridicas"=>$personas_juridicas]);
            // , "searchText"=>$query
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona_juridica=DB::table('persona_juridica')->get();
        $tipo_identificacion=DB::table('tipo_identificacion')->get();
        $instrumento_financiero=DB::table('instrumento_financiero')->get();
        $tipo_empresa=DB::table('tipo_empresa')->get();
        $ciudad=DB::table('ciudad')->get();
        $tipo_vinculacion=DB::table('tipo_vinculacion')->get();
        $clase_vinculacion=DB::table('clase_vinculacion')->get();
        $ciiu=DB::table('ciiu')->get();
        $documento_constitucion=DB::table('documento_constitucion')->get();
        $detalle_actividad=DB::table('detalle_actividad')->get();
        $info_tributaria=DB::table('info_tributaria')->get();
        $origen_recursos=DB::table('origen_recursos')->get();
        $estado_cliente=DB::table('estado_cliente')->get();
        $estado_datos=DB::table('estado_datos')->get();
        $tipo_retenedor=DB::table('tipo_retenedor')->get();
        $tipo_moneda=DB::table('tipo_moneda')->get();
        $tipo_transaccion=DB::table('tipo_transaccion')->get();
        $entidad_bancaria=DB::table('entidad_bancaria')->get();
        $tipo_cuenta_bancaria=DB::table('tipo_cuenta_bancaria')->get();
        $usuarios=DB::table('users')->get();

        return view('persona.juridica.create',["persona_juridica"=>$persona_juridica,
                                               "tipos_identificaciones"=>$tipo_identificacion,
                                               "instrumentos_financieros"=>$instrumento_financiero,
                                               "tipos_empresas"=>$tipo_empresa,
                                               "ciudades"=>$ciudad,
                                               "tipos_vinculaciones"=>$tipo_vinculacion,
                                               "clases_vinculaciones"=>$clase_vinculacion,
                                               "codigos_ciiu"=>$ciiu,
                                               "detalles_actividades"=>$detalle_actividad,
                                               "documentos_constitucion"=>$documento_constitucion,
                                               "info_tributarias"=>$info_tributaria,
                                               "origenes_recursos"=>$origen_recursos,
                                               "estados_clientes"=>$estado_cliente,
                                               "estados_datos"=>$estado_datos,
                                               "tipos_retenedores"=>$tipo_retenedor,
                                               "tipos_monedas"=>$tipo_moneda,
                                               "tipos_transacciones"=>$tipo_transaccion,
                                               "entidades_bancarias"=>$entidad_bancaria,
                                               "tipos_cuentas_bancarias"=>$tipo_cuenta_bancaria,
                                               "usuarios"=>$usuarios,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaJuridicaFormRequest $request)
    {
        $persona_juridica = new persona_juridica;
        $mytime =Carbon::now('America/Bogota');
        $persona_juridica->fecha_diligenciamiento=$mytime->toDateTimeString();
        $persona_juridica->id_user='1';
        $persona_juridica->id_trader='1';
        $persona_juridica->id_estado_cliente='1';
        $persona_juridica->id_estado_datos='1';
        $persona_juridica->razon_social=$request->get('razon_social');
        $persona_juridica->tipo_identificacion='6';
        $persona_juridica->id=$request->get('num_identificacion');
        $persona_juridica->dig_ver=$request->get('dig_ver');
        $persona_juridica->direccion_notificacion=$request->get('direccion_notificacion');
        $persona_juridica->id_depto_notificacion=$request->get('id_depto_notificacion');
        $persona_juridica->id_ciudad_notificacion=$request->get('id_ciudad_notificacion');
        $persona_juridica->telefono_notificacion=$request->get('telefono_notificacion');
        $persona_juridica->direccion_oficina_princ=$request->get('direccion_oficina_princ');
        $persona_juridica->id_depto_ofic_princ=$request->get('id_depto_ofic_princ');
        $persona_juridica->id_ciudad_ofic_princ=$request->get('id_ciudad_ofic_princ');
        $persona_juridica->telefono_oficina_princ=$request->get('telefono_oficina_princ');
        $persona_juridica->pagina_web=$request->get('pagina_web');
        $persona_juridica->fax_oficina=$request->get('fax_oficina');
        $persona_juridica->referencia=$request->get('referencia');
        $persona_juridica->id_doc_constitucion=$request->get('id_doc_constitucion');
        $persona_juridica->doc_constitucion=$request->get('doc_constitucion');
        $persona_juridica->num_doc_constitucion=$request->get('num_doc_constitucion');
        $persona_juridica->fecha_radic_doc=$request->get('fecha_radic_doc');
        $persona_juridica->id_ciudad_radc_doc=$request->get('id_ciudad_radc_doc');
        $persona_juridica->id_info_trib_1=$request->get('id_info_trib_1');
        $persona_juridica->id_origen_recursos=$request->get('id_origen_recursos');
        $persona_juridica->origen_recursos=$request->get('origen_recursos');
        $persona_juridica->id_tipo_empresa=$request->get('id_tipo_empresa');
        $persona_juridica->tipo_empresa=$request->get('tipo_empresa');
        $persona_juridica->id_codigo_CIIU=$request->get('id_codigo_CIIU');
        $persona_juridica->id_instrumento_financiero=$request->get('id_instrumento_financiero');
        $persona_juridica->fecha_vinculacion=$request->get('fecha_vinculacion');
        $persona_juridica->id_ciudad_vinculacion=$request->get('id_ciudad_vinculacion');
        $persona_juridica->id_tipo_vinculacion=$request->get('id_tipo_vinculacion');
        $persona_juridica->id_clase_vinculacion=$request->get('id_clase_vinculacion');
        $persona_juridica->lista_ONU='0';
        $persona_juridica->lista_clinton='0';

         /**
         * Info Básica
         */

         /**
         * Representante Legal
         */
        $rep_legal = new pj_representante_legal;
        $rep_legal->id=$request->get('num_identificacion');
        $rep_legal->tipo_identificacion=$request->get('tipo_identificacion');
        $rep_legal->num_identificacion=$request->get('num_identificacion_rep_legal');
        $rep_legal->lugar_exp_doc=$request->get('lugar_exp_doc');
        $rep_legal->lugar_nacimiento=$request->get('lugar_nacimiento');
        $rep_legal->fecha_nacimiento=$request->get('fecha_nacimiento');
        $rep_legal->fecha_exp_doc=$request->get('fecha_exp_doc');
        $rep_legal->apellidos=$request->get('apellidos');
        $rep_legal->nombres=$request->get('nombres');
        $rep_legal->ciudad_residencia=$request->get('ciudad_residencia');
        $rep_legal->direccion_residencia=$request->get('direccion_residencia');
        $rep_legal->telefono=$request->get('telefono');
        $rep_legal->celular=$request->get('celular');
        $rep_legal->email=$request->get('email');
        $rep_legal->vinculo_func_agrobolsa=$request->get('vinculo_func_agrobolsa');
        $rep_legal->nombre_vinc_func_agrobolsa=$request->get('nombre_vinc_func_agrobolsa');
        $rep_legal->persona_expuesta_publicamente=$request->get('persona_expuesta_publicamente');
        $rep_legal->desc_pers_recon_public=$request->get('desc_pers_recon_public');
        $rep_legal->cargo_publico_reciente=$request->get('cargo_publico_reciente');
        $rep_legal->nombre_cargo_publico=$request->get('institucion_cargo_publico');
        $rep_legal->institucion_cargo_publico=$request->get('nombre_cargo_publico');
        $rep_legal->manejo_recursos_publicos=$request->get('manejo_recursos_publicos');
          /**
         * Representante Legal
         */

         /**
         * Info Financiera
         */
        $info_financiera=new pj_info_financiera;
        $info_financiera->id=$request->get('num_identificacion');
        $info_financiera->fecha_corte=$request->get('fecha_corte');
        $info_financiera->activos=$request->get('activos');
        $info_financiera->pasivos=$request->get('pasivos');
        $info_financiera->patrimonio='2';
        $info_financiera->ingr_operac_mensuales=$request->get('ingr_operac_mensuales');
        $info_financiera->ingr_no_operac_mensuales=$request->get('ingr_no_operac_mensuales');
        $info_financiera->egre_operac_mensuales=$request->get('egre_operac_mensuales');
        $info_financiera->egre_no_operac_mensuales=$request->get('egre_no_operac_mensuales');
        $info_financiera->util_perd_operacional=$request->get('util_perd_operacional');
        $info_financiera->util_perd_neta=$request->get('util_perd_neta');
        $info_financiera->descrip_ingr_egre_no_operacionales=$request->get('descrip_ingr_egre_no_operacionales');
         /**
         * Info Financiera
         */

          /**
         * ORigen Fondos
         */
        $orig_fondos=new pj_origen_fondos;
        $orig_fondos->id=$request->get('num_identificacion');
        $orig_fondos->detalle_actividad_negocio=$request->get('detalle_actividad_negocio');
        $orig_fondos->entidad_referencia_comercial=$request->get('entidad_referencia_comercial');
        $orig_fondos->direccion_referencia_comercial=$request->get('direccion_referencia_comercial');
        $orig_fondos->telefono_referencia_comercial=$request->get('telefono_referencia_comercial');
        $orig_fondos->id_entidad_cuenta_bancaria_1=$request->get('id_entidad_cuenta_bancaria_1');
        $orig_fondos->num_cuenta_bancaria_1=$request->get('num_cuenta_bancaria_1');
        $orig_fondos->id_tipo_cuenta_bancaria_1=$request->get('id_tipo_cuenta_bancaria_1');

         /**
         * Origen Fondos
         */

          /**
         * ME
         */
        $me=new pj_operaciones_moneda_extranjera;
        $me->id=$request->get('num_identificacion');
        $me->cuentas_moneda_extranjera=$request->get('cuentas_moneda_extranjera');
        $me->cuenta_compensacion=$request->get('cuenta_compensacion');
        $me->ciudad_cuenta_bancaria_me_1=$request->get('ciudad_cuenta_bancaria_me_1');
        $me->pais_cuenta_bancaria_me_1=$request->get('pais_cuenta_bancaria_me_1');
        $me->id_tipo_moneda_me_1=$request->get('id_tipo_moneda_me_1');
        $me->id_tipo_transaccion_1=$request->get('id_tipo_transaccion_1');
        $me->tipo_transaccion=$request->get('tipo_transaccion');

         /**
         * ME
         */


          /**
         * FACTA
         */
        $facta = new pj_declaracion_facta;
        $facta->id=$request->get('num_identificacion');
        $facta->obligaciones_tributarias_EEUU_US=$request->get('obligaciones_tributarias_EEUU_US');
        $facta->especificacion_obligaciones_tributarias=$request->get('especificacion_obligaciones_tributarias');
        $facta->num_TIN_equivalente=$request->get('num_TIN_equivalente');

          /**
         * FACTA
         */


          /**
         * CRS
         */
        $crs = new pj_declaracion_crs;
        $crs->id=$request->get('num_identificacion');
        $crs->obligaciones_fiscales_otros_paises=$request->get('obligaciones_fiscales_otros_paises');
        $crs->especificacion_obligaciones_fiscales=$request->get('especificacion_obligaciones_fiscales');
        $crs->id_pais_obligaciones_fiscales=$request->get('id_pais_obligaciones_fiscales');
        $crs->num_identificacion_fiscal_equivalente=$request->get('num_identificacion_fiscal_equivalente');

          /**
         * CRS
         */

          /**
         * ORDENANTES
         */
        $ord = new pj_ordenantes;
        $ord->id=$request->get('num_identificacion');
        $ord->nombres_ordenante_1=$request->get('nombres_ordenante_1');
        $ord->apellidos_ordenante_1=$request->get('apellidos_ordenante_1');
        $ord->tipo_identificacion_ordenante_1=$request->get('tipo_identificacion_ordenante_1');
        $ord->num_identificacion_ordenante_1=$request->get('num_identificacion_ordenante_1');
        $ord->telefono_ordenante_1=$request->get('telefono_ordenante_1');
        $ord->direccion_ordenante_1=$request->get('direccion_ordenante_1');

        /**
         * ORDENANTES
         */

          /**
         * ACCIONISTAS
         */
        $accio = new pj_accionista;
        $accio->id=$request->get('num_identificacion');
        $accio->tipo_identificacion_accionista_1=$request->get('tipo_identificacion_accionista_1');
        $accio->num_identificacion_accionista_1=$request->get('num_identificacion_accionista_1');
        $accio->nombre_completo_accionista_1=$request->get('nombre_completo_accionista_1');
        $accio->admin_recursos_publicos_accionista_1=$request->get('admin_recursos_publicos_accionista_1');
        $accio->ejerce_poder_publico_accionista_1=$request->get('ejerce_poder_publico_accionista_1');
        $accio->reconocimiento_publico_accionista_1=$request->get('reconocimiento_publico_accionista_1');
        $accio->id_pais_declaracion_tributaria_accionista_1=$request->get('id_pais_declaracion_tributaria_accionista_1');
        $accio->porc_participacion_accionista_1=$request->get('porc_participacion_accionista_1');

        /**
         * ACCIONISTAS
         */

        $persona_juridica->num_ident_rep_legales_ordenantes=$request->get('num_identificacion_rep_legal');

        $persona_juridica->save();
        $rep_legal->save();
        $info_financiera->save();
        $orig_fondos->save();
        $me->save();
        $facta->save();
        $crs->save();
        $ord->save();
        $accio->save();
         return Redirect::to('persona_juridica');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona_juridica= persona_juridica::find($id);
        $rep_legal=pj_representante_legal::find($id);
        $info_finan=pj_info_financiera::find($id);
        $orig_fond=pj_origen_fondos::find($id);
        $me=pj_operaciones_moneda_extranjera::find($id);
        $facta=pj_declaracion_facta::find($id);
        $crs=pj_declaracion_crs::find($id);
        $accio=pj_accionista::find($id);
        $ord=pj_ordenantes::find($id);
        $tipo_identificacion=DB::table('tipo_identificacion')->get();
        $instrumento_financiero=DB::table('instrumento_financiero')->get();
        $tipo_empresa=DB::table('tipo_empresa')->get();
        $ciudad=DB::table('ciudad')->get();
        $tipo_vinculacion=DB::table('tipo_vinculacion')->get();
        $clase_vinculacion=DB::table('clase_vinculacion')->get();
        $ciiu=DB::table('ciiu')->get();
        $documento_constitucion=DB::table('documento_constitucion')->get();
        $detalle_actividad=DB::table('detalle_actividad')->get();
        $info_tributaria=DB::table('info_tributaria')->get();
        $origen_recursos=DB::table('origen_recursos')->get();
        $estado_cliente=DB::table('estado_cliente')->get();
        $estado_datos=DB::table('estado_datos')->get();
        $tipo_retenedor=DB::table('tipo_retenedor')->get();
        $tipo_moneda=DB::table('tipo_moneda')->get();
        $tipo_transaccion=DB::table('tipo_transaccion')->get();
        $entidad_bancaria=DB::table('entidad_bancaria')->get();
        $tipo_cuenta_bancaria=DB::table('tipo_cuenta_bancaria')->get();
        $usuarios=DB::table('users')->get();

        return view('persona.juridica.edit',["persona_juridica"=>$persona_juridica,
                                             "rep_legal"=>$rep_legal,
                                             "info_finan"=>$info_finan,
                                             "orig_fond"=>$orig_fond,
                                             "me"=>$me,
                                             "facta"=>$facta,
                                             "crs"=>$crs,
                                             "accio"=>$accio,
                                             "ord"=>$ord,
                                             "tipos_identificaciones"=>$tipo_identificacion,
                                             "instrumentos_financieros"=>$instrumento_financiero,
                                             "tipos_empresas"=>$tipo_empresa,
                                             "ciudades"=>$ciudad,
                                             "tipos_vinculaciones"=>$tipo_vinculacion,
                                             "clases_vinculaciones"=>$clase_vinculacion,
                                             "codigos_ciiu"=>$ciiu,
                                             "detalles_actividades"=>$detalle_actividad,
                                             "documentos_constitucion"=>$documento_constitucion,
                                             "info_tributarias"=>$info_tributaria,
                                             "origenes_recursos"=>$origen_recursos,
                                             "estados_clientes"=>$estado_cliente,
                                             "estados_datos"=>$estado_datos,
                                             "tipos_retenedores"=>$tipo_retenedor,
                                             "tipos_monedas"=>$tipo_moneda,
                                             "tipos_transacciones"=>$tipo_transaccion,
                                             "entidades_bancarias"=>$entidad_bancaria,
                                             "tipos_cuentas_bancarias"=>$tipo_cuenta_bancaria,
                                             "usuarios"=>$usuarios,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaJuridicaFormRequest $request)
    {
        $mytime =Carbon::now('America/Bogota');
        $id = $request->get('num_identificacion');
        $persona_juridica = persona_juridica::find($id);
        $persona_juridica->id_user='1';
        $persona_juridica->id_trader='1';
        $persona_juridica->id_estado_cliente=$request->get('id_estado_cliente');
        $persona_juridica->id_estado_datos='2';
        $persona_juridica->razon_social=$request->get('razon_social');
        $persona_juridica->direccion_notificacion=$request->get('direccion_notificacion');
        $persona_juridica->id_depto_notificacion=$request->get('id_depto_notificacion');
        $persona_juridica->id_ciudad_notificacion=$request->get('id_ciudad_notificacion');
        $persona_juridica->telefono_notificacion=$request->get('telefono_notificacion');
        $persona_juridica->direccion_oficina_princ=$request->get('direccion_oficina_princ');
        $persona_juridica->id_depto_ofic_princ=$request->get('id_depto_ofic_princ');
        $persona_juridica->id_ciudad_ofic_princ=$request->get('id_ciudad_ofic_princ');
        $persona_juridica->telefono_oficina_princ=$request->get('telefono_oficina_princ');
        $persona_juridica->pagina_web=$request->get('pagina_web');
        $persona_juridica->fax_oficina=$request->get('fax_oficina');
        $persona_juridica->referencia=$request->get('referencia');
        $persona_juridica->doc_constitucion=$request->get('doc_constitucion');
        $persona_juridica->num_doc_constitucion=$request->get('num_doc_constitucion');
        $persona_juridica->fecha_radic_doc=$request->get('fecha_radic_doc');
        $persona_juridica->id_ciudad_radc_doc=$request->get('id_ciudad_radc_doc');
        $persona_juridica->id_info_trib_1=$request->get('id_info_trib_1');
        $persona_juridica->id_origen_recursos=$request->get('id_origen_recursos');
        $persona_juridica->origen_recursos=$request->get('origen_recursos');
        $persona_juridica->id_tipo_empresa=$request->get('id_tipo_empresa');
        $persona_juridica->tipo_empresa=$request->get('tipo_empresa');
        $persona_juridica->id_codigo_CIIU=$request->get('id_codigo_CIIU');
        $persona_juridica->id_instrumento_financiero=$request->get('id_instrumento_financiero');
        $persona_juridica->fecha_vinculacion=$request->get('fecha_vinculacion');
        $persona_juridica->id_ciudad_vinculacion=$request->get('id_ciudad_vinculacion');
        $persona_juridica->id_tipo_vinculacion=$request->get('id_tipo_vinculacion');
        $persona_juridica->id_clase_vinculacion=$request->get('id_clase_vinculacion');
        $persona_juridica->lista_ONU='0';
        $persona_juridica->lista_clinton='0';

         /**
         * Info Básica
         */

         /**
         * Representante Legal
         */
        $rep_legal = pj_representante_legal::find($id);
        $rep_legal->tipo_identificacion=$request->get('tipo_identificacion');
        $rep_legal->num_identificacion=$request->get('num_identificacion_rep_legal');
        $rep_legal->lugar_exp_doc=$request->get('lugar_exp_doc');
        $rep_legal->lugar_nacimiento=$request->get('lugar_nacimiento');
        $rep_legal->fecha_nacimiento=$request->get('fecha_nacimiento');
        $rep_legal->fecha_exp_doc=$request->get('fecha_exp_doc');
        $rep_legal->apellidos=$request->get('apellidos');
        $rep_legal->nombres=$request->get('nombres');
        $rep_legal->ciudad_residencia=$request->get('ciudad_residencia');
        $rep_legal->direccion_residencia=$request->get('direccion_residencia');
        $rep_legal->telefono=$request->get('telefono');
        $rep_legal->celular=$request->get('celular');
        $rep_legal->email=$request->get('email');
        $rep_legal->vinculo_func_agrobolsa=$request->get('vinculo_func_agrobolsa');
        $rep_legal->nombre_vinc_func_agrobolsa=$request->get('nombre_vinc_func_agrobolsa');
        $rep_legal->persona_expuesta_publicamente=$request->get('persona_expuesta_publicamente');
        $rep_legal->desc_pers_recon_public=$request->get('desc_pers_recon_public');
        $rep_legal->cargo_publico_reciente=$request->get('cargo_publico_reciente');
        $rep_legal->nombre_cargo_publico=$request->get('institucion_cargo_publico');
        $rep_legal->institucion_cargo_publico=$request->get('nombre_cargo_publico');
        $rep_legal->manejo_recursos_publicos=$request->get('manejo_recursos_publicos');
          /**
         * Representante Legal
         */

         /**
         * Info Financiera
         */
        $info_financiera=pj_info_financiera::find($id);
        $info_financiera->fecha_corte=$request->get('fecha_corte');
        $info_financiera->activos=$request->get('activos');
        $info_financiera->pasivos=$request->get('pasivos');
        $act = $request->get('activos');
        $pas = $request->get('pasivos');
        $pat = $act - $pas;
        $info_financiera->patrimonio=$pat;
        $info_financiera->ingr_operac_mensuales=$request->get('ingr_operac_mensuales');
        $info_financiera->ingr_no_operac_mensuales=$request->get('ingr_no_operac_mensuales');
        $info_financiera->egre_operac_mensuales=$request->get('egre_operac_mensuales');
        $info_financiera->egre_no_operac_mensuales=$request->get('egre_no_operac_mensuales');
        $info_financiera->util_perd_operacional=$request->get('util_perd_operacional');
        $info_financiera->util_perd_neta=$request->get('util_perd_neta');
        $info_financiera->descrip_ingr_egre_no_operacionales=$request->get('descrip_ingr_egre_no_operacionales');
         /**
         * Info Financiera
         */

          /**
         * ORigen Fondos
         */
        $orig_fondos=pj_origen_fondos::find($id);
        $orig_fondos->detalle_actividad_negocio=$request->get('detalle_actividad_negocio');
        $orig_fondos->entidad_referencia_comercial=$request->get('entidad_referencia_comercial');
        $orig_fondos->direccion_referencia_comercial=$request->get('direccion_referencia_comercial');
        $orig_fondos->telefono_referencia_comercial=$request->get('telefono_referencia_comercial');
        $orig_fondos->id_entidad_cuenta_bancaria_1=$request->get('id_entidad_cuenta_bancaria_1');
        $orig_fondos->num_cuenta_bancaria_1=$request->get('num_cuenta_bancaria_1');
        $orig_fondos->id_tipo_cuenta_bancaria_1=$request->get('id_tipo_cuenta_bancaria_1');

         /**
         * Origen Fondos
         */

          /**
         * ME
         */
        $me=pj_operaciones_moneda_extranjera::find($id);
        $me->cuentas_moneda_extranjera=$request->get('cuentas_moneda_extranjera');
        $me->cuenta_compensacion=$request->get('cuenta_compensacion');
        $me->entidad_cuenta_bancaria_me_1=$request->get('entidad_cuenta_bancaria_me_1');
        $me->num_cuenta_bancaria_me_1=$request->get('num_cuenta_bancaria_me_1');
        $me->ciudad_cuenta_bancaria_me_1=$request->get('ciudad_cuenta_bancaria_me_1');
        $me->pais_cuenta_bancaria_me_1=$request->get('pais_cuenta_bancaria_me_1');
        $me->id_tipo_moneda_me_1=$request->get('id_tipo_moneda_me_1');
        $me->id_tipo_transaccion_1=$request->get('id_tipo_transaccion_1');
        $me->tipo_transaccion=$request->get('tipo_transaccion');

         /**
         * ME
         */


          /**
         * FACTA
         */
        $facta = pj_declaracion_facta::find($id);
        $facta->obligaciones_tributarias_EEUU_US=$request->get('obligaciones_tributarias_EEUU_US');
        $facta->especificacion_obligaciones_tributarias=$request->get('especificacion_obligaciones_tributarias');
        $facta->num_TIN_equivalente=$request->get('num_TIN_equivalente');

          /**
         * FACTA
         */


          /**
         * CRS
         */
        $crs = pj_declaracion_crs::find($id);
        $crs->obligaciones_fiscales_otros_paises=$request->get('obligaciones_fiscales_otros_paises');
        $crs->especificacion_obligaciones_fiscales=$request->get('especificacion_obligaciones_fiscales');
        $crs->id_pais_obligaciones_fiscales=$request->get('id_pais_obligaciones_fiscales');
        $crs->num_identificacion_fiscal_equivalente=$request->get('num_identificacion_fiscal_equivalente');

          /**
         * CRS
         */

          /**
         * ORDENANTES
         */
        $ord = pj_ordenantes::find($id);
        $ord->nombres_ordenante_1=$request->get('nombres_ordenante_1');
        $ord->apellidos_ordenante_1=$request->get('apellidos_ordenante_1');
        $ord->tipo_identificacion_ordenante_1=$request->get('tipo_identificacion_ordenante_1');
        $ord->num_identificacion_ordenante_1=$request->get('num_identificacion_ordenante_1');
        $ord->telefono_ordenante_1=$request->get('telefono_ordenante_1');
        $ord->direccion_ordenante_1=$request->get('direccion_ordenante_1');

        /**
         * ORDENANTES
         */

          /**
         * ACCIONISTAS
         */
        $accio = pj_accionista::find($id);
        $accio->tipo_identificacion_accionista_1=$request->get('tipo_identificacion_accionista_1');
        $accio->num_identificacion_accionista_1=$request->get('num_identificacion_accionista_1');
        $accio->nombre_completo_accionista_1=$request->get('nombre_completo_accionista_1');
        $accio->admin_recursos_publicos_accionista_1=$request->get('admin_recursos_publicos_accionista_1');
        $accio->ejerce_poder_publico_accionista_1=$request->get('ejerce_poder_publico_accionista_1');
        $accio->reconocimiento_publico_accionista_1=$request->get('reconocimiento_publico_accionista_1');
        $accio->id_pais_declaracion_tributaria_accionista_1=$request->get('id_pais_declaracion_tributaria_accionista_1');
        $accio->porc_participacion_accionista_1=$request->get('porc_participacion_accionista_1');

        /**
         * ACCIONISTAS
         */

        $persona_juridica->num_ident_rep_legales_ordenantes=$request->get('num_identificacion_rep_legal');

        $persona_juridica->update();
        $rep_legal->update();
        $info_financiera->update();
        $orig_fondos->update();
        $me->update();
        $facta->update();
        $crs->update();
        $ord->update();
        $accio->update();
        return Redirect::to('persona_juridica')->with('success', 'Persona Jurídica is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
