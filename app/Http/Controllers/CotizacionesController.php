<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Cotizaciones;
use sisVentas\Ambulancias;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\CotizacionesFormRequest;

use DB;

class CotizacionesController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $cotizacion=DB::table('cotizacion')
            ->where('id_cotizacion','LIKE','%'.$query.'%')
            ->orderBy('id_cotizacion','asc')
            ->where ('oculto','=','1')
            ->paginate(7);
            return view('licasoft.cotizaciones.index',["cotizacion"=>$cotizacion,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        $ambulancias = Ambulancias::all();
        return view("licasoft.cotizaciones.create", compact("ambulancias"));
        
    }

    public function store (CotizacionesFormRequest $request)
    {
        $cotizaciones= new Cotizaciones;
        $cotizaciones->origen=$request->get('origen');
        $cotizaciones->destino=$request->get('destino');
        $cotizaciones->precio_base=$request->get('precio_base');
        $cotizaciones->precio_combustible=$request->get('precio_combustible');
        $cotizaciones->precio_hora=$request->get('precio_hora');
        $cotizaciones->precio_duracion=$request->get('precio_duracion');
        $cotizaciones->precio_kilometro=$request->get('precio_kilometro');
        $cotizaciones->estado='No aceptada';
        $cotizaciones->oculto='1';
        $cotizaciones->total=$request->get('total');

        $cotizaciones->save();
        return Redirect::to('licasoft/');

    }
    public function destroy($id)
    {
        $cotizaciones=Cotizaciones::findOrFail($id);
        $cotizaciones->estado='cancelada';
        $cotizaciones->oculto='0';
        $cotizaciones->update();
        return Redirect::to('licasoft/cotizaciones');
    }
 




}
