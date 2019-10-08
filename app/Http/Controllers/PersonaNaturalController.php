<?php

namespace AgroSys\Http\Controllers;

use AgroSys\Http\Requests\PersonaNaturalFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use AgroSys\persona_natural;
use AgroSys\pn_declaraciones_crs;
use AgroSys\pn_declaraciones_facta;
use AgroSys\pn_info_financiera;
use AgroSys\pn_operaciones_moneda_extranjera;
use AgroSys\pn_ordenantes;
use AgroSys\pn_origen_fondos;
use DB;

class PersonaNaturalController extends Controller
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
            $personas_naturales=DB::table('persona_natural as pn')
            ->join('tipo_identificacion as ti', 'pn.tipo_identificacion', '=','ti.id')
            ->join('genero as g', 'pn.id_genero', '=','g.id')
            ->join('estado_civil as ec', 'pn.id_estado_civil', '=','ec.id')
            ->join('tipo_persona as tp', 'pn.id_tipo_persona', '=','tp.id')
            ->join('clase_vinculacion as cv', 'pn.id_clase_vinculacion', '=','cv.id')
            ->join('tipo_vinculacion as tv', 'pn.id_tipo_vinculacion', '=','tv.id')
            ->join('tipo_cliente as tc', 'pn.id_tipo_cliente', '=','tc.id')
            ->join('tipo_empresa as te', 'pn.id_tipo_empresa', '=','te.id')
            ->join('instrumento_financiero as if', 'pn.id_instrumento_financiero', '=','if.id')
            ->join('ocupacion as ocu', 'pn.id_ocupacion','=','ocu.id')
            ->select('pn.id','ti.sigla','pn.nombres',
                     'pn.apellidos','g.genero as id_genero','ec.estado_civil as id_estado_civil',
                     'tp.tipo_persona as id_tipo_persona','pn.direccion_residencia','pn.celular',
                     'pn.email','pn.lista_clinton','pn.lista_ONU','pn.persona_expuesta_publicamente',
                     'cv.clase_vinculacion as id_clase_vinculacion','tv.tipo_vinculacion as id_tipo_vinculacion',
                     'tc.tipo_cliente as id_tipo_cliente','te.tipo_empresa as id_tipo_empresa',
                     'if.instrumento_financiero as id_instrumento_financiero','ocu.ocupacion as id_ocupacion')
            ->where('pn.id','LIKE','%'.$query.'%')->get();

            return view('persona.natural.index',["personas_naturales"=>$personas_naturales, "searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona_natural=DB::table('persona_natural')->get();
        $tipo_identificacion=DB::table('tipo_identificacion')->get();
        $ciudad=DB::table('ciudad')->get();
        $clase_vinculacion=DB::table('clase_vinculacion')->get();
        $estado_civil=DB::table('estado_civil')->get();
        $genero=DB::table('genero')->get();
        $tipo_persona=DB::table('tipo_persona')->get();
        $tipo_vinculacion=DB::table('tipo_vinculacion')->get();
        $calidad_ordenante=DB::table('calidad_ordenante')->get();
        $cargo=DB::table('cargo')->get();
        $detalle_actividad=DB::table('detalle_actividad')->get();
        $entidad_bancaria=DB::table('entidad_bancaria')->get();
        $instrumento_financiero=DB::table('instrumento_financiero')->get();
        $tipo_cuenta_bancaria=DB::table('tipo_cuenta_bancaria')->get();
        $tipo_empresa=DB::table('tipo_empresa')->get();
        $tipo_fuente_fondos=DB::table('tipo_fuente_fondos')->get();
        $tipo_moneda=DB::table('tipo_moneda')->get();
        $tipo_regimen=DB::table('tipo_regimen')->get();
        $tipo_retenedor=DB::table('tipo_retenedor')->get();
        $tipo_transaccion=DB::table('tipo_transaccion')->get();
        $tipo_cliente=DB::table('tipo_cliente')->get();
        $tipo_empresa=DB::table('tipo_empresa')->get();
        $ciiu=DB::table('ciiu')->get();
        $ocupacion=DB::table('ocupacion')->get();
        $usuario=DB::table('users')->get();

        return view('persona.natural.create',[
                    "persona_natural"=>$persona_natural,
                    "tipos_identificaciones"=>$tipo_identificacion,
                    "ciudades"=>$ciudad,
                    "clases_vinculaciones"=>$clase_vinculacion,
                    "estados_civiles"=>$estado_civil,
                    "generos"=>$genero,
                    "tipos_personas"=>$tipo_persona,
                    "calidad_ordenantes"=>$calidad_ordenante,
                    "cargos"=>$cargo,
                    "detalle_actividades"=>$detalle_actividad,
                    "entidades_bancarias"=>$entidad_bancaria,
                    "instrumentos_financieros"=>$instrumento_financiero,
                    "tipos_cuentas_bancarias"=>$tipo_cuenta_bancaria,
                    "tipos_empresas"=>$tipo_empresa,
                    "tipos_vinculaciones"=>$tipo_vinculacion,
                    "tipos_fuentes_fondos"=>$tipo_fuente_fondos,
                    "tipos_monedas"=>$tipo_moneda,
                    "tipos_regimenes"=>$tipo_regimen,
                    "tipos_retenedores"=>$tipo_retenedor,
                    "tipos_transacciones"=>$tipo_transaccion,
                    "tipos_clientes"=>$tipo_cliente,
                    "usuarios"=>$usuario,
                    "tipos_empresas"=>$tipo_empresa,
                    "detalles_actividades"=>$detalle_actividad,
                    "tipos_regimenes"=>$tipo_regimen,
                    "codigos_ciiu"=>$ciiu,
                    "ocupaciones"=>$ocupacion,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaNaturalFormRequest $request)
    {
        $persona_natural = new persona_natural;
        $mytime =Carbon::now('America/Bogota');
        $persona_natural->id_user='1';
        $persona_natural->id_trader='1';
        $persona_natural->id_tipo_persona='1';
        $persona_natural->id_estado_cliente=$request->get('id_estado_cliente');
        $persona_natural->fecha_diligenciamiento=$mytime->toDateTimeString();
        $persona_natural->id_ciudad_vinculacion=$request->get('id_ciudad_vinculacion');
        $persona_natural->id_tipo_vinculacion=$request->get('id_tipo_vinculacion');
        $persona_natural->fecha_vinculacion=$request->get('fecha_vinculacion');
        $persona_natural->id_clase_vinculacion=$request->get('id_clase_vinculacion');
        $persona_natural->id_instrumento_financiero=$request->get('id_instrumento_financiero');
        $persona_natural->id_estado_datos='1';
        $persona_natural->nombres=$request->get('nombres');
        $persona_natural->apellidos=$request->get('apellidos');
        $persona_natural->tipo_identificacion=$request->get('tipo_identificacion');
        $persona_natural->id=$request->get('num_identificacion');
        $persona_natural->fecha_exp_doc=$request->get('fecha_exp_doc');
        $persona_natural->lugar_exp_doc=$request->get('lugar_exp_doc');
        $persona_natural->id_genero=$request->get('id_genero');
        $persona_natural->id_estado_civil=$request->get('id_estado_civil');
        $persona_natural->id_tipo_cliente='1';
        $persona_natural->direccion_residencia=$request->get('direccion_residencia');
        $persona_natural->id_ciudad_residencia=$request->get('id_ciudad_residencia');
        $persona_natural->telefono=$request->get('telefono');
        $persona_natural->celular=$request->get('celular');
        $persona_natural->email=$request->get('email');
        $persona_natural->lista_ONU='0';
        $persona_natural->lista_clinton='0';
        $persona_natural->empresa_trabajo=$request->get('empresa_trabajo');
        $persona_natural->cargo_desempenio=$request->get('cargo_desempenio');
        $persona_natural->id_ciudad_trabajo=$request->get('id_ciudad_trabajo');
        $persona_natural->direccion_oficina=$request->get('direccion_oficina');
        $persona_natural->telefono_oficina=$request->get('telefono_oficina');
        $persona_natural->id_tipo_empresa=$request->get('id_tipo_empresa');
        $persona_natural->id_ocupacion=$request->get('id_ocupacion');
        $persona_natural->vinculo_func_agrobolsa=$request->get('vinculo_func_agrobolsa');
        $persona_natural->nombre_vinc_func_agrobolsa=$request->get('nombre_vinc_func_agrobolsa');
        $persona_natural->persona_expuesta_publicamente=$request->get('persona_expuesta_publicamente');
        $persona_natural->desc_pers_recon_public=$request->get('desc_pers_recon_public');
        $persona_natural->cargo_publico_reciente=$request->get('cargo_publico_reciente');
        $persona_natural->nombre_cargo_publico=$request->get('nombre_cargo_publico');
        $persona_natural->institucion_cargo_publico=$request->get('institucion_cargo_publico');
        $persona_natural->manejo_recursos_publicos=$request->get('manejo_recursos_publicos');

        /**
         * Info Básica
         */

         /**
         * Info Finan
         */
        // $activos = $request->get('activos');
        // $pasivos = $request->get('pasivos');
        $info_finan = new pn_info_financiera;
        $info_finan->id=$request->get('num_identificacion');
        $info_finan->activos=$request->get('activos');
        $info_finan->pasivos=$request->get('pasivos');
        $info_finan->patrimonio="2";
        $info_finan->ingresos_mensuales=$request->get('ingresos_mensuales');
        $info_finan->egresos_mensuales=$request->get('egresos_mensuales');
        $info_finan->otros_ingresos=$request->get('otros_ingresos');
        $info_finan->detalle_otros_ingresos=$request->get('detalle_otros_ingresos');
        $info_finan->otros_egresos=$request->get('otros_egresos');
        $info_finan->detalle_otros_egresos=$request->get('detalle_otros_egresos');
        $info_finan->id_detalle_actividad=$request->get('id_detalle_actividad');
        $info_finan->explicacion_actividad=$request->get('explicacion_actividad');
        $info_finan->id_tipo_regimen=$request->get('id_tipo_regimen');
        $info_finan->id_codigo_CIIU=$request->get('id_codigo_CIIU');
        $info_finan->declaracion_renta=$request->get('declaracion_renta');

         /**
         * Info Finan
         */

         /**
         * Origen Fondos
         */
        $origen_fondos = new pn_origen_fondos;
        $origen_fondos->id=$request->get('num_identificacion');
        $origen_fondos->id_tipo_fuente_fondos=$request->get('id_tipo_fuente_fondos');
        $origen_fondos->entidad_referencia_comercial=$request->get('entidad_referencia_comercial');
        $origen_fondos->direccion_referencia_comercial=$request->get('direccion_referencia_comercial');
        $origen_fondos->telefono_referencia_comercial=$request->get('telefono_referencia_comercial');
        $origen_fondos->id_entidad_cuenta_bancaria_1=$request->get('id_entidad_cuenta_bancaria_1');
        $origen_fondos->num_cuenta_bancaria_1=$request->get('num_cuenta_bancaria_1');
        $origen_fondos->id_tipo_cuenta_bancaria_1=$request->get('id_tipo_cuenta_bancaria_1');
        $origen_fondos->id_entidad_cuenta_bancaria_2=$request->get('id_entidad_cuenta_bancaria_2');
        $origen_fondos->num_cuenta_bancaria_2=$request->get('num_cuenta_bancaria_2');
        $origen_fondos->id_tipo_cuenta_bancaria_2=$request->get('id_tipo_cuenta_bancaria_2');

         /**
         * Origen Fondos
         */

         /**
         * Operaciones Moneda Extranjera
         */
        $op_mon_ext= new pn_operaciones_moneda_extranjera;
        $op_mon_ext->id=$request->get('num_identificacion');
        $op_mon_ext->cuentas_moneda_extranjera=$request->get('cuentas_moneda_extranjera');
        $op_mon_ext->cuenta_compensacion=$request->get('cuenta_compensacion');
        $op_mon_ext->id_tipo_transaccion=$request->get('id_tipo_transaccion');
        $op_mon_ext->entidad_cuenta_bancaria_me_1=$request->get('entidad_cuenta_bancaria_me_1');
        $op_mon_ext->num_cuenta_bancaria_me_1=$request->get('num_cuenta_bancaria_me_1');
        $op_mon_ext->ciudad_cuenta_bancaria_me_1=$request->get('ciudad_cuenta_bancaria_me_1');
        $op_mon_ext->pais_cuenta_bancaria_me_1=$request->get('pais_cuenta_bancaria_me_1');
        $op_mon_ext->id_tipo_moneda_me_1=$request->get('id_tipo_moneda_me_1');
        $op_mon_ext->entidad_cuenta_bancaria_me_2=$request->get('entidad_cuenta_bancaria_me_2');
        $op_mon_ext->num_cuenta_bancaria_me_2=$request->get('num_cuenta_bancaria_me_2');
        $op_mon_ext->num_cuenta_bancaria_me_2=$request->get('num_cuenta_bancaria_me_2');
        $op_mon_ext->pais_cuenta_bancaria_me_2=$request->get('pais_cuenta_bancaria_me_2');
        $op_mon_ext->id_tipo_moneda_me_2=$request->get('id_tipo_moneda_me_2');

         /**
         * Operaciones Moneda Extranjera
         */

          /**
         * Declaraciones FACTA
         */
        $dec_facta = new pn_declaraciones_facta;
        $dec_facta->id=$request->get('num_identificacion');
        $dec_facta->obligaciones_tributarias_EEUU_US=$request->get('obligaciones_tributarias_EEUU_US');
        $dec_facta->especificacion_obligaciones_tributarias=$request->get('especificacion_obligaciones_tributarias');
        $dec_facta->num_TIN_equivalente=$request->get('num_TIN_equivalente');
        
          /**
         * Declaraciones FACTA
         */

          /**
         * Declaraciones CRS
         */
        $dec_crs = new pn_declaraciones_crs;
        $dec_crs->id=$request->get('num_identificacion');
        $dec_crs->obligaciones_fiscales_otros_paises=$request->get('obligaciones_fiscales_otros_paises');
        $dec_crs->especificacion_obligaciones_fiscales=$request->get('especificacion_obligaciones_fiscales');
        $dec_crs->id_pais_obligaciones_fiscales=$request->get('id_pais_obligaciones_fiscales');
        $dec_crs->num_identificacion_fiscal_equivalente=$request->get('num_identificacion_fiscal_equivalente');
        
          /**
         * Declaraciones CRS
         */

         /**
         * Ordenantes
         */
        $orden= new pn_ordenantes;
        $orden->id=$request->get('num_identificacion');
        $orden->nombres_ordenante_1=$request->get('nombres_ordenante_1');
        $orden->apellidos_ordenante_1=$request->get('apellidos_ordenante_1');
        $orden->tipo_identificacion_ordenante_1=$request->get('tipo_identificacion_ordenante_1');
        $orden->num_identificacion_ordenante_1=$request->get('num_identificacion_ordenante_1');
        $orden->direccion_ordenante_1=$request->get('direccion_ordenante_1');
        $orden->telefono_ordenante_1=$request->get('telefono_ordenante_1');
        $orden->parentesco_ordenante_1=$request->get('parentesco_ordenante_1');
        $orden->id_calidad_ordenante_1=$request->get('id_calidad_ordenante_1');
        $orden->nombres_ordenante_2=$request->get('nombres_ordenante_2');
        $orden->apellidos_ordenante_2=$request->get('apellidos_ordenante_2');
        $orden->tipo_identificacion_ordenante_2=$request->get('tipo_identificacion_ordenante_2');
        $orden->num_identificacion_ordenante_2=$request->get('num_identificacion_ordenante_2');
        $orden->direccion_ordenante_2=$request->get('direccion_ordenante_2');
        $orden->telefono_ordenante_2=$request->get('telefono_ordenante_2');
        $orden->parentesco_ordenante_2=$request->get('parentesco_ordenante_2');
        $orden->id_calidad_ordenante_2=$request->get('id_calidad_ordenante_2');

         /**
         * ORdenantes
         */

         // $persona_natural->fecha_actualizacion='NULL';

        $persona_natural->save();
        $info_finan->save();
        $origen_fondos->save();
        $op_mon_ext->save();
        $dec_facta->save();
        $dec_crs->save();
        $orden->save();
        return Redirect::to('persona_natural');
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
        $persona_natural = persona_natural::find($id);
        $info_financiera = pn_info_financiera::find($id);
        $decl_crs = pn_declaraciones_crs::find($id);
        $decl_facta = pn_declaraciones_facta::find($id);
        $origen_fondos = pn_origen_fondos::find($id);
        $oper_me = pn_operaciones_moneda_extranjera::find($id);
        $ordenantes = pn_ordenantes::find($id);
        $tipo_identificacion=DB::table('tipo_identificacion')->get();
        $ciudad=DB::table('ciudad')->get();
        $clase_vinculacion=DB::table('clase_vinculacion')->get();
        $estado_civil=DB::table('estado_civil')->get();
        $genero=DB::table('genero')->get();
        $tipo_persona=DB::table('tipo_persona')->get();
        $tipo_vinculacion=DB::table('tipo_vinculacion')->get();
        $calidad_ordenante=DB::table('calidad_ordenante')->get();
        $cargo=DB::table('cargo')->get();
        $detalle_actividad=DB::table('detalle_actividad')->get();
        $entidad_bancaria=DB::table('entidad_bancaria')->get();
        $instrumento_financiero=DB::table('instrumento_financiero')->get();
        $tipo_cuenta_bancaria=DB::table('tipo_cuenta_bancaria')->get();
        $tipo_empresa=DB::table('tipo_empresa')->get();
        $tipo_fuente_fondos=DB::table('tipo_fuente_fondos')->get();
        $tipo_moneda=DB::table('tipo_moneda')->get();
        $tipo_regimen=DB::table('tipo_regimen')->get();
        $tipo_retenedor=DB::table('tipo_retenedor')->get();
        $tipo_transaccion=DB::table('tipo_transaccion')->get();
        $tipo_cliente=DB::table('tipo_cliente')->get();
        $tipo_empresa=DB::table('tipo_empresa')->get();
        $ciiu=DB::table('ciiu')->get();
        $ocupacion=DB::table('ocupacion')->get();
        $usuario=DB::table('users')->get();
        return view('persona.natural.edit',["persona_natural"=>$persona_natural,
                                            "info_financiera"=>$info_financiera,
                                            "decl_crs"=>$decl_crs,
                                            "decl_facta"=>$decl_facta,
                                            "origen_fondos"=>$origen_fondos,
                                            "oper_me"=>$oper_me,
                                            "ordenantes"=>$ordenantes,
                                            "tipos_identificaciones"=>$tipo_identificacion,
                                            "ciudades"=>$ciudad,
                                            "clases_vinculaciones"=>$clase_vinculacion,
                                            "estados_civiles"=>$estado_civil,
                                            "generos"=>$genero,
                                            "tipos_personas"=>$tipo_persona,
                                            "calidad_ordenantes"=>$calidad_ordenante,
                                            "cargos"=>$cargo,
                                            "detalle_actividades"=>$detalle_actividad,
                                            "entidades_bancarias"=>$entidad_bancaria,
                                            "instrumentos_financieros"=>$instrumento_financiero,
                                            "tipos_cuentas_bancarias"=>$tipo_cuenta_bancaria,
                                            "tipos_empresas"=>$tipo_empresa,
                                            "tipos_vinculaciones"=>$tipo_vinculacion,
                                            "tipos_fuentes_fondos"=>$tipo_fuente_fondos,
                                            "tipos_monedas"=>$tipo_moneda,
                                            "tipos_regimenes"=>$tipo_regimen,
                                            "tipos_retenedores"=>$tipo_retenedor,
                                            "tipos_transacciones"=>$tipo_transaccion,
                                            "tipos_clientes"=>$tipo_cliente,
                                            "usuarios"=>$usuario,
                                            "tipos_empresas"=>$tipo_empresa,
                                            "detalles_actividades"=>$detalle_actividad,
                                            "tipos_regimenes"=>$tipo_regimen,
                                            "codigos_ciiu"=>$ciiu,
                                            "ocupaciones"=>$ocupacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonaNaturalFormRequest $request)
    {
        $id = $request->get('num_identificacion');
        $persona_natural = persona_natural::find($id);
        $mytime =Carbon::now('America/Bogota');
        $persona_natural->id_user='1';
        $persona_natural->id_trader='1';
        $persona_natural->id_tipo_persona='1';
        $persona_natural->id_estado_cliente=$request->get('id_estado_cliente');
        $persona_natural->fecha_diligenciamiento=$mytime->toDateTimeString();
        $persona_natural->id_ciudad_vinculacion=$request->get('id_ciudad_vinculacion');
        $persona_natural->id_tipo_vinculacion=$request->get('id_tipo_vinculacion');
        $persona_natural->fecha_vinculacion=$request->get('fecha_vinculacion');
        $persona_natural->id_clase_vinculacion=$request->get('id_clase_vinculacion');
        $persona_natural->id_instrumento_financiero=$request->get('id_instrumento_financiero');
        $persona_natural->id_estado_datos='1';
        $persona_natural->nombres=$request->get('nombres');
        $persona_natural->apellidos=$request->get('apellidos');
        $persona_natural->tipo_identificacion=$request->get('tipo_identificacion');
        $persona_natural->id=$request->get('num_identificacion');
        $persona_natural->fecha_exp_doc=$request->get('fecha_exp_doc');
        $persona_natural->lugar_exp_doc=$request->get('lugar_exp_doc');
        $persona_natural->id_genero=$request->get('id_genero');
        $persona_natural->id_estado_civil=$request->get('id_estado_civil');
        $persona_natural->id_tipo_cliente=$request->get('id_tipo_cliente');
        $persona_natural->direccion_residencia=$request->get('direccion_residencia');
        $persona_natural->id_ciudad_residencia=$request->get('id_ciudad_residencia');
        $persona_natural->telefono=$request->get('telefono');
        $persona_natural->celular=$request->get('celular');
        $persona_natural->email=$request->email;
        $persona_natural->lista_ONU='0';
        $persona_natural->lista_clinton='0';
        $persona_natural->empresa_trabajo=$request->get('empresa_trabajo');
        $persona_natural->cargo_desempenio=$request->get('cargo_desempenio');
        $persona_natural->id_ciudad_trabajo=$request->get('id_ciudad_trabajo');
        $persona_natural->direccion_oficina=$request->get('direccion_oficina');
        $persona_natural->telefono_oficina=$request->get('telefono_oficina');
        $persona_natural->id_tipo_empresa=$request->get('id_tipo_empresa');
        $persona_natural->id_ocupacion=$request->get('id_ocupacion');
        $persona_natural->vinculo_func_agrobolsa=$request->get('vinculo_func_agrobolsa');
        $persona_natural->nombre_vinc_func_agrobolsa=$request->get('nombre_vinc_func_agrobolsa');
        $persona_natural->persona_expuesta_publicamente=$request->get('persona_expuesta_publicamente');
        $persona_natural->desc_pers_recon_public=$request->get('desc_pers_recon_public');
        $persona_natural->cargo_publico_reciente=$request->get('cargo_publico_reciente');
        $persona_natural->nombre_cargo_publico=$request->get('nombre_cargo_publico');
        $persona_natural->institucion_cargo_publico=$request->get('institucion_cargo_publico');
        $persona_natural->manejo_recursos_publicos=$request->get('manejo_recursos_publicos');
       /**
         * Básica
         */

        /**
         * info finan
         */
        $info_finan=pn_info_financiera::find($id);
        $info_finan->activos=$request->get('activos');
        $info_finan->pasivos=$request->get('pasivos');
        $act = $request->get('activos');
        $pas = $request->get('pasivos');
        $pat = $act - $pas;
        $info_finan->patrimonio=$pat;
        $info_finan->ingresos_mensuales=$request->get('ingresos_mensuales');
        $info_finan->egresos_mensuales=$request->get('egresos_mensuales');
        $info_finan->otros_ingresos=$request->get('otros_ingresos');
        $info_finan->detalle_otros_ingresos=$request->get('detalle_otros_ingresos');
        $info_finan->otros_egresos=$request->get('otros_egresos');
        $info_finan->detalle_otros_egresos=$request->get('detalle_otros_egresos');
        $info_finan->id_detalle_actividad=$request->get('id_detalle_actividad');
        $info_finan->explicacion_actividad=$request->get('explicacion_actividad');
        $info_finan->id_tipo_regimen=$request->get('id_tipo_regimen');
        $info_finan->id_codigo_CIIU=$request->get('id_codigo_CIIU');
        $info_finan->declaracion_renta=$request->get('declaracion_renta');

        /**
         * info finan
         */


        /**
         * Origen Fondos
         */
        $origen_fondos = pn_origen_fondos::find($id);
        $origen_fondos->id_tipo_fuente_fondos=$request->get('id_tipo_fuente_fondos');
        $origen_fondos->entidad_referencia_comercial=$request->get('entidad_referencia_comercial');
        $origen_fondos->direccion_referencia_comercial=$request->get('direccion_referencia_comercial');
        $origen_fondos->telefono_referencia_comercial=$request->get('telefono_referencia_comercial');
        $origen_fondos->id_entidad_cuenta_bancaria_1=$request->get('id_entidad_cuenta_bancaria_1');
        $origen_fondos->num_cuenta_bancaria_1=$request->get('num_cuenta_bancaria_1');
        $origen_fondos->id_tipo_cuenta_bancaria_1=$request->get('id_tipo_cuenta_bancaria_1');
        $origen_fondos->id_entidad_cuenta_bancaria_2=$request->get('id_entidad_cuenta_bancaria_2');
        $origen_fondos->num_cuenta_bancaria_2=$request->get('num_cuenta_bancaria_2');
        $origen_fondos->id_tipo_cuenta_bancaria_2=$request->get('id_tipo_cuenta_bancaria_2');

         /**
         * Origen Fondos
         */

         /**
         * Operaciones Moneda Extranjera
         */
        $op_mon_ext= pn_operaciones_moneda_extranjera::find($id);
        $op_mon_ext->cuentas_moneda_extranjera=$request->get('cuentas_moneda_extranjera');
        $op_mon_ext->cuenta_compensacion=$request->get('cuenta_compensacion');
        $op_mon_ext->id_tipo_transaccion=$request->get('id_tipo_transaccion');
        $op_mon_ext->entidad_cuenta_bancaria_me_1=$request->get('entidad_cuenta_bancaria_me_1');
        $op_mon_ext->num_cuenta_bancaria_me_1=$request->get('num_cuenta_bancaria_me_1');
        $op_mon_ext->ciudad_cuenta_bancaria_me_1=$request->get('ciudad_cuenta_bancaria_me_1');
        $op_mon_ext->pais_cuenta_bancaria_me_1=$request->get('pais_cuenta_bancaria_me_1');
        $op_mon_ext->id_tipo_moneda_me_1=$request->get('id_tipo_moneda_me_1');
        // $op_mon_ext->entidad_cuenta_bancaria_me_2=$request->get('entidad_cuenta_bancaria_me_2');
        // $op_mon_ext->num_cuenta_bancaria_me_2=$request->get('num_cuenta_bancaria_me_2');
        // $op_mon_ext->num_cuenta_bancaria_me_2=$request->get('num_cuenta_bancaria_me_2');
        // $op_mon_ext->pais_cuenta_bancaria_me_2=$request->get('pais_cuenta_bancaria_me_2');
        // $op_mon_ext->id_tipo_moneda_me_2=$request->get('id_tipo_moneda_me_2');

         /**
         * Operaciones Moneda Extranjera
         */

          /**
         * Declaraciones FACTA
         */
        $dec_facta = pn_declaraciones_facta::find($id);
        $dec_facta->obligaciones_tributarias_EEUU_US=$request->get('obligaciones_tributarias_EEUU_US');
        $dec_facta->especificacion_obligaciones_tributarias=$request->get('especificacion_obligaciones_tributarias');
        $dec_facta->num_TIN_equivalente=$request->get('num_TIN_equivalente');
        
          /**
         * Declaraciones FACTA
         */

          /**
         * Declaraciones CRS
         */
        $dec_crs = pn_declaraciones_crs::find($id);
        $dec_crs->obligaciones_fiscales_otros_paises=$request->get('obligaciones_fiscales_otros_paises');
        $dec_crs->especificacion_obligaciones_fiscales=$request->get('especificacion_obligaciones_fiscales');
        $dec_crs->id_pais_obligaciones_fiscales=$request->get('id_pais_obligaciones_fiscales');
        $dec_crs->num_identificacion_fiscal_equivalente=$request->get('num_identificacion_fiscal_equivalente');
        
          /**
         * Declaraciones CRS
         */

         /**
         * Ordenantes
         */
        $orden= pn_ordenantes::find($id);
        $orden->nombres_ordenante_1=$request->get('nombres_ordenante_1');
        $orden->apellidos_ordenante_1=$request->get('apellidos_ordenante_1');
        $orden->tipo_identificacion_ordenante_1=$request->get('tipo_identificacion_ordenante_1');
        $orden->num_identificacion_ordenante_1=$request->get('num_identificacion_ordenante_1');
        $orden->direccion_ordenante_1=$request->get('direccion_ordenante_1');
        $orden->telefono_ordenante_1=$request->get('telefono_ordenante_1');
        $orden->parentesco_ordenante_1=$request->get('parentesco_ordenante_1');
        // $orden->id_calidad_ordenante_1=$request->get('id_calidad_ordenante_1');
        // $orden->nombres_ordenante_2=$request->get('nombres_ordenante_2');
        // $orden->apellidos_ordenante_2=$request->get('apellidos_ordenante_2');
        // $orden->tipo_identificacion_ordenante_2=$request->get('tipo_identificacion_ordenante_2');
        // $orden->num_identificacion_ordenante_2=$request->get('num_identificacion_ordenante_2');
        // $orden->direccion_ordenante_2=$request->get('direccion_ordenante_2');
        // $orden->telefono_ordenante_2=$request->get('telefono_ordenante_2');
        // $orden->parentesco_ordenante_2=$request->get('parentesco_ordenante_2');
        // $orden->id_calidad_ordenante_2=$request->get('id_calidad_ordenante_2');

         /**
         * Ordenantes
         */

        $persona_natural->update();
        $info_finan->update();
        $origen_fondos->update();
        $op_mon_ext->update();
        $dec_facta->update();
        $dec_crs->update();
        $orden->update();
        return Redirect::to('persona_natural')->with('success', 'Persona Natural is successfully updated');
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
