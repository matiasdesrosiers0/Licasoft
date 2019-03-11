<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Ficha;
use sisVentas\Pacientes;
use sisVentas\Movil;
use sisVentas\User;
use sisVentas\Convenios;
use sisVentas\Ambulancias;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\FichaPendienteFormRequest;
use DB;

class FichaPendienteController extends Controller
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
            ->orderBy('id_ficha','asc')
            ->where ('estado_ficha','=','1')
            ->paginate(7);
            return view('licasoft.fichaPendiente.index', compact("convenios", "pacientes", "movil", "ambulancias"), ["ficha"=>$ficha,"searchText"=>$query]);
        }
    }

   

    public function show($id)
    {
        return view("licasoft.fichaPendiente.show",["ficha"=>Ficha::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("licasoft.fichaPendiente.edit",["ficha"=>Ficha::findOrFail($id)]);
    }
    public function update(FichaPendienteFormRequest $request,$id)
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
        return Redirect::to('licasoft/fichaPendiente');
    }


    public function destroy($id)
    {
        $ficha=Ficha::findOrFail($id);
       
        $ficha->estado_ficha='3';
        $ficha->update();
        return Redirect::to('licasoft/fichaPendiente');
    }





}