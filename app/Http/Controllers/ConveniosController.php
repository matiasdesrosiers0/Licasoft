<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Convenios;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ConveniosFormRequest;
use DB;

class ConveniosController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $convenios=DB::table('users')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->where ('tipo','=','0')
            ->paginate(7);
            return view('licasoft.convenios.index',["convenios"=>$convenios,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("licasoft.convenios.create");
    }
    public function store (ConveniosFormRequest $request)
    {
        $convenios=new Convenios;
        $convenios->nombre=$request->get('nombre');
        $convenios->direccion=$request->get('direccion');
        $convenios->telefono=$request->get('telefono');
        $convenios->precio_km_habil=$request->get('precio_km_habil');
        $convenios->precio_km_inhabil=$request->get('precio_km_inhabil');
        $convenios->precio_km_fuera=$request->get('precio_km_fuera');
        $convenios->deuda_total=$request->get('deuda_total');
        $convenios->ubicacion=$request->get('ubicacion');
        $convenios->tipo='2';

        $convenios->save();
        return Redirect::to('licasoft/convenios');

    }
    public function map($id)
    {
        return view("licasoft.convenios.map",["convenios"=>Convenios::findOrFail($id)]);
    }

    public function show($id)
    {
        return view("licasoft.convenios.show",["convenios"=>Convenios::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("licasoft.convenios.edit",["convenios"=>Convenios::findOrFail($id)]);
    }
    public function update(ConveniosFormRequest $request,$id)
    {
        $convenios=Convenios::findOrFail($id);
        $convenios->name=$request->get('nombre');
        $convenios->direccion=$request->get('direccion');
        $convenios->telefono=$request->get('telefono');
        $convenios->direccion=$request->get('direccion');  
        $convenios->update();
        return Redirect::to('licasoft/convenios');
    }

   
    public function destroy($id)
    {
        $convenios=Convenios::findOrFail($id);
        $convenios->tipo='5';
        $convenios->update();
        return Redirect::to('licasoft/convenios');
    }





}
