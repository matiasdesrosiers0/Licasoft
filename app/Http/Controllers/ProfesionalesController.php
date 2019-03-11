<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Profesionales;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ProfesionalesFormRequest;
use DB;

class ProfesionalesController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $profesionales=DB::table('profesional')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id_profesional','asc')
            ->where ('ocultar','=','1')
            ->paginate(7);
            return view('licasoft.profesionales.index',["profesionales"=>$profesionales,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("licasoft.profesionales.create");
    }
    public function store (ProfesionalesFormRequest $request)
    {
        $profesionales= new Profesionales;
        $profesionales->nombre=$request->get('nombre');
        $profesionales->cargo=$request->get('cargo');
        $profesionales->telefono=$request->get('telefono');
        $profesionales->ocultar='1';

        $profesionales->save();
        return Redirect::to('licasoft/profesionales');

    }

    public function show($id)
    {
        return view("licasoft.profesionales.show",["profesionales"=>Profesionales::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("licasoft.profesionales.edit",["profesionales"=>Profesionales::findOrFail($id)]);
    }
    public function update(ProfesionalesFormRequest $request,$id)
    {
        $profesionales=Profesionales::findOrFail($id);
        $profesionales->nombre=$request->get('nombre');
        $profesionales->cargo=$request->get('cargo');
        $profesionales->telefono=$request->get('telefono');
        $profesionales->ocultar='1';
        
        $profesionales->update();
        return Redirect::to('licasoft/profesionales');
    }


    public function destroy($id)
    {
        $profesionales=Profesionales::findOrFail($id);
        $profesionales->ocultar='0';
        $profesionales->update();
        return Redirect::to('licasoft/profesionales');
    }





}