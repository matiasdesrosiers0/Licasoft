<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Movil;
use sisVentas\Ambulancias;
use sisVentas\Profesionales;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\MovilFormRequest;
use DB;

class MovilController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        $ambulancias = Ambulancias::all();
        $profesionales = Profesionales::all();
        if ($request)
        {
            
            $query=trim($request->get('searchText'));
            $movil=DB::table('movil')->where('id_profesional_conductor','LIKE','%'.$query.'%')
            ->orderBy('id_movil','asc')
            ->where ('ocultar','=','1')
            ->paginate(7);
            return view('licasoft.movil.index', compact("ambulancias", "profesionales"), ["movil"=>$movil,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        $ambulancias = Ambulancias::all();
        $profesionales = Profesionales::all();
        return view("licasoft.movil.create", compact("ambulancias", "profesionales"));
    }
    public function store (MovilFormRequest $request)
    {
        $movil=new Movil;
        
        $movil->id_ambulancia=$request->get('id_ambulancia');
        
        $movil->id_profesional_conductor=$request->get('id_profesional_conductor');
        $movil->id_profesional_paramedico=$request->get('id_profesional_paramedico');
        $movil->id_profesional_medico=$request->get('id_profesional_medico');
        $movil->id_profesional_enfermero=$request->get('id_profesional_enfermero');
        $movil->id_profesional_regulador=$request->get('id_profesional_regulador');
        $movil->ocultar='1';

        $movil->save();
        return Redirect::to('licasoft/movil');

    }

    public function show($id)
    {
        $ambulancias = Ambulancias::all();
        $profesionales = Profesionales::all();
        return view("licasoft.movil.show", compact("ambulancias", "profesionales"), ["movil"=>Movil::findOrFail($id)]);
    }
    public function edit($id)
    {
        $ambulancias = Ambulancias::all();
        $profesionales = Profesionales::all();
        return view("licasoft.movil.edit", compact("ambulancias", "profesionales"), ["movil"=>Movil::findOrFail($id)]);
    }
    public function update(MovilFormRequest $request,$id)
    {
        $movil=Movil::findOrFail($id);
        $movil->id_profesional_conductor=$request->get('id_profesional_conductor');
        $movil->id_profesional_paramedico=$request->get('id_profesional_paramedico');
        $movil->id_profesional_medico=$request->get('id_profesional_medico');
        $movil->id_profesional_enfermero=$request->get('id_profesional_enfermero');
        $movil->id_profesional_regulador=$request->get('id_profesional_regulador');
        $movil->ocultar='1'; 
        $movil->update();
        return Redirect::to('licasoft/movil');
    }


    public function destroy($id)
    {
        $movil=Movil::findOrFail($id);
        $movil->ocultar='0';
        $movil->update();
        return Redirect::to('licasoft/movil');
    }





}
