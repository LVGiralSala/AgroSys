<?php

namespace AgroSys\Http\Controllers;

use AgroSys\Http\Requests\PersonaJuridicaFormRequest;
use AgroSys\persona_juridica;
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

        return view('persona.juridica.create',[
                    "persona_juridica"=>$persona_juridica,
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
        $persona_juridica->fecha_diligenciameinto=$mytime->toDateTimeString();
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
        $persona_juridica->id_doc_constitucion=$request->get('id_doc_contitucion');
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

        $persona_juridica->id_rep_legales_ordenantes='123456';

        $persona_juridica->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
