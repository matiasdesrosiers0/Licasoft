<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Pacientes;
use sisVentas\User;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PacientesFormRequest;
use sisVentas\Http\Requests\PacientessFormRequest;
use DB;

class PacientesController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes=DB::table('paciente')->where('nombres','LIKE','%'.$query.'%')
            ->orderBy('rut_paciente','asc')
            ->where ('ocultar','=','1')
            ->paginate(7);
            return view('licasoft.paciente.index',["pacientes"=>$pacientes,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        $convenios = User::all();

        return view("licasoft.paciente.create", compact("convenios"));
    }
    public function store (PacientesFormRequest $request)
    {
        $pacientes=new Pacientes;
        $pacientes->rut_paciente=$request->get('rut_paciente');
        $pacientes->nombres=$request->get('nombres');
        $pacientes->apellidos=$request->get('apellidos');
        $pacientes->edad=$request->get('edad');
        $pacientes->sexo=$request->get('sexo');
        $pacientes->ocultar='1';
        $pacientes->id_convenio=$request->get('id_convenio');
      


        $pacientes->save();
        return Redirect::to('licasoft/paciente');

    }
   

    public function show($id)
    {
        return view("licasoft.paciente.show",["pacientes"=>Pacientes::findOrFail($id)]);
    }
    public function edit($id)
    {
        $convenios = Convenios::all();

        return view("licasoft.paciente.edit", compact("convenios"), ["pacientes"=>Pacientes::findOrFail($id)]);
    }
    public function update(PacientessFormRequest $request,$id)
    {
        $pacientes=Pacientes::findOrFail($id);
        
        $pacientes->nombres=$request->get('nombres');
        $pacientes->apellidos=$request->get('apellidos');
        $pacientes->edad=$request->get('edad');
        $pacientes->sexo=$request->get('sexo');
        $pacientes->id_convenio=$request->get('id_convenio'); 
        $pacientes->update();
        return Redirect::to('licasoft/paciente');
    }

 
    public function destroy($id)
    {
        $pacientes=Pacientes::findOrFail($id);
        $pacientes->ocultar='0';
        $pacientes->update();
        return Redirect::to('licasoft/convenios');
    }





}
