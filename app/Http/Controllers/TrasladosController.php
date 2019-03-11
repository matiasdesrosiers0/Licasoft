<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Traslados;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\TrasladosFormRequest;
use DB;


class TrasladosController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $traslados=DB::table('ficha')->where('id_ficha','LIKE','%'.$query.'%')
            ->orderBy('id_ficha','desc')
            ->paginate(7);
            return view('licasoft.traslados.index',["ficha"=>$traslados,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("licasoft.traslados.create");
    }
    public function store (TrasladosFormRequest $request)
    {
        $traslados=new Traslados;
        $traslados->nombre=$request->get('nombre');
        $traslados->save();
        return Redirect::to('licasoft/traslados/index');

    }
    public function show($id)
    {
        return view("licasoft.traslados.show",["traslados"=>Traslados::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }





}
