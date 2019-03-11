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

class DeudaController extends Controller
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

        $ficha2 = Ficha::
        select(DB::raw('id_convenio, SUM(total) as resultado'))
        ->from('ficha')
        ->groupBy('id_convenio')
        ->where ('estado_ficha','=','3')
        ->get();



            $query=trim($request->get('searchText'));
            $ficha=DB::table('ficha')
            ->where('id_convenio','LIKE','%'.$query.'%')
            ->where ('estado_ficha','=','3')
            ->paginate(100);
            return view('licasoft.deuda.index',  compact("convenios", "pacientes", "movil", "ambulancias", "ficha2"), ["ficha"=>$ficha,"searchText"=>$query]);
        }
    }
    public function show($id)
    {
        return view("licasoft.ambulancias.show",["ambulancias"=>Ambulancias::findOrFail($id)]);
    }
}


    
    
   