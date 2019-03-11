<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Ambulancias;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\AmbulanciasFormRequest;
use DB;

class AmbulanciasController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $ambulancias=DB::table('ambulancia')
            ->where('modelo','LIKE','%'.$query.'%')
            ->orderBy('id_ambulancia','asc')
            ->where ('ocultar','=','1')
            ->paginate(7);
            return view('licasoft.ambulancias.index',["ambulancias"=>$ambulancias,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("licasoft.ambulancias.create");
    }
    public function store (AmbulanciasFormRequest $request)
    {
        $ambulancias= new Ambulancias;
        $ambulancias->modelo=$request->get('modelo');
        $ambulancias->marca=$request->get('marca');
        $ambulancias->combustible=$request->get('combustible');
        $ambulancias->kmxlitro=$request->get('kmxlitro');
        $ambulancias->año=$request->get('año');
        $ambulancias->estado=$request->get('estado');
        $ambulancias->otros=$request->get('otros');
        $ambulancias->ocultar='1';

        $ambulancias->save();
        return Redirect::to('licasoft/ambulancias');

    }

    public function show($id)
    {
        return view("licasoft.ambulancias.show",["ambulancias"=>Ambulancias::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("licasoft.ambulancias.edit",["ambulancias"=>Ambulancias::findOrFail($id)]);
    }
    public function update(AmbulanciasFormRequest $request,$id)
    {
        $ambulancias=Ambulancias::findOrFail($id);
        $ambulancias->modelo=$request->get('modelo');
        $ambulancias->marca=$request->get('marca');
        $ambulancias->combustible=$request->get('combustible');
        $ambulancias->año=$request->get('año');
        $ambulancias->estado=$request->get('estado');
        $ambulancias->otros=$request->get('otros');
        $ambulancias->ocultar='1';
        
        $ambulancias->update();
        return Redirect::to('licasoft/ambulancias');
    }


    public function destroy($id)
    {
        $ambulancias=Ambulancias::findOrFail($id);
        $ambulancias->ocultar='0';
        $ambulancias->update();
        return Redirect::to('licasoft/ambulancias');
    }





}