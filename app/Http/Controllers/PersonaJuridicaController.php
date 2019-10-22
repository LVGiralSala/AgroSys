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
        //
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
