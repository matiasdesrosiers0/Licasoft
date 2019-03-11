<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Ficha;
use sisVentas\User;
use sisVentas\Pacientes;
use sisVentas\Movil;
use sisVentas\Convenios;
use sisVentas\Ambulancias;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\FichaFormRequest;
use DB;

class FichaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $convenios = User::all();
        $pacientes = Pacientes::all();
        $movil = Movil::all();
        $ambulancias = Ambulancias::all();
            $query=trim($request->get('searchText'));
            $ficha=DB::table('ficha')
            ->where('id_convenio','LIKE','%'.$query.'%')
            ->where ('estado_ficha','=','3')
            ->paginate(7);
            return view('licasoft.ficha.index',  compact("convenios", "pacientes", "movil", "ambulancias"), ["ficha"=>$ficha,"searchText"=>$query]);
        }
    }

    
    
    public function create()
    {
       
        $convenios = User::all();
        $pacientes = Pacientes::all();
        $movil = Movil::all();
        $ambulancias = Ambulancias::all();

        return view("licasoft.ficha.create", compact("convenios", "pacientes", "movil", "ambulancias"));
    }
   
    public function store (FichaFormRequest $request)
    {
        $ficha= new Ficha;
        $ficha->id_convenio=$request->get('id_convenio');
        $ficha->fecha=$request->get('fecha');
        $ficha->rut_paciente=$request->get('rut_paciente');
        $ficha->tipo=$request->get('tipo');
        $ficha->requerimientos='1';
        $ficha->id_movil=$request->get('id_movil');
        $ficha->observacion=$request->get('observacion');
        $ficha->estado_movil=$request->get('estado_movil');
        $ficha->estado_ficha=$request->get('estado_ficha');
        $ficha->origen=$request->get('origen');
        $ficha->destino=$request->get('destino');
        $ficha->precio_base=$request->get('precio_base');
        $ficha->precio_combustible=$request->get('precio_combustible');
        $ficha->precio_hora=$request->get('precio_hora');
        $ficha->precio_duracion=$request->get('precio_duracion');
        $ficha->precio_kilometro=$request->get('precio_kilometro');
        $ficha->total=$request->get('total');
        $ficha->hora_despacho='0';
        $ficha->hora_llegada='0';
        $ficha->hora_salida_qth='0';
        $ficha->hora_llegada_qth='0';
        $ficha->hora_420='0';
        $ficha->estado_movil='0';
        $ficha->estado_ficha='1';

        $ficha->save();
        return Redirect::to('licasoft/');

    }

    public function show($id)
    {
        return view("licasoft.ambulancias.show",["ambulancias"=>Ambulancias::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("licasoft.ficha.edit",["ficha"=>Ficha::findOrFail($id)]);
    }
    public function update(FichaFormRequest $request,$id)
    {
        $ficha=Ficha::findOrFail($id);
        $ficha->hora_despacho=$request->get('hora_despacho');
        $ficha->hora_llegada=$request->get('hora_llegada');
        $ficha->hora_salida_qth=$request->get('hora_salida_qth');
        $ficha->hora_llegada_qth=$request->get('hora_llegada_qth');
        $ficha->hora_420=$request->get('hora_420');
        $ficha->estado_movil=$request->get('estado_movil');
        $ficha->precio_tiempo_extra=$request->get('precio_tiempo_extra');
        $ficha->total=$request->get('total')+$request->get('precio_tiempo_extra');
        $ficha->update();
        return Redirect::to('licasoft/ficha');
    }


    public function destroy($id)
    {
        $ficha=Ficha::findOrFail($id);
        $ficha->estado_ficha='4';
        $ficha->update();
        return Redirect::to('licasoft/fichaPendiente');
    }





}