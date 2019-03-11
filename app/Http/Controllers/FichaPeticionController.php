<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Ficha;
use sisVentas\Pacientes;
use sisVentas\User;
use sisVentas\Movil;
use sisVentas\Convenios;
use sisVentas\Ambulancias;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\FichaPeticionFormRequest;
use sisVentas\Http\Requests\FichaFormRequest;
use DB;

class FichaPeticionController extends Controller
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
            ->where ('estado_ficha','=','0')
            ->paginate(7);
            return view('licasoft.fichaPeticion.index', compact("convenios", "pacientes", "movil", "ambulancias"), ["ficha"=>$ficha,"searchText"=>$query]);
        }
    }

    public function create()
    {
       
        $convenios = User::all();
        $pacientes = Pacientes::all();
        $movil = Movil::all();
        $ambulancias = Ambulancias::all();

        return view("licasoft.fichaPeticion.create", compact("convenios", "pacientes", "movil", "ambulancias"));
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
        $ficha->estado_ficha='0';

        $ficha->save();
        return Redirect::to('licasoft/fichaPeticion');

    }
   

    public function destroy($id)
    {
        $ficha=Ficha::findOrFail($id);
        $ficha->estado_ficha='1';
        $ficha->update();
        return Redirect::to('licasoft/fichaPeticion');
    }
   





}