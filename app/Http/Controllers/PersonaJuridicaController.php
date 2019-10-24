<?php

namespace AgroSys\Http\Controllers;

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
            ->select('pj.id','ti.sigla','pj.razon_social','pj.lista_clinton','pj.lista_ONU',
                     'cv.clase_vinculacion as id_clase_vinculacion','tv.tipo_vinculacion as id_tipo_vinculacion',
                     'if.instrumento_financiero as id_instrumento_financiero')
            ->where('pj.id','LIKE','%'.$query.'%')->get();

            return view('persona.juridica.index',["personas_juridica"=>$personas_juridicas]);
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
                    "tipo_identificaciones"=>$tipo_identificacion,
                    "instrumento_financieros"=>$instrumento_financiero,
                    "tipos_empresas"=>$tipo_empresa,
                    "ciudades"=>$ciudad,
                    "tipos_vinculaciones"=>$tipo_vinculacion,
                    "clases_vinculaciones"=>$clase_vinculacion,
                    "codigos_ciiu"=>$ciiu,
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
    public function store(Request $request)
    {
        //
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
