<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\Reportes;
use sisVentas\Ficha;
use sisVentas\User;
use sisVentas\Convenios;
use sisVentas\Pacientes;
use Illuminate\Support\Facades\Redirect;

use DB;

class ReportesController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        

        $convenios = User::all();
        $ficha = Ficha::
        select(DB::raw('id_convenio, count(*) as resultado'))
        ->from('ficha')
        ->groupBy('id_convenio')
        ->where ('estado_ficha','=','3')
        ->get();
        return view("licasoft.reportes.index", compact("convenios"),['ficha'=>$ficha]);

    }

    public function create()
    {
        $convenios = User::all();
        $ficha = Ficha::
        select(DB::raw('id_convenio, SUM(total) as resultado'))
        ->from('ficha')
        ->groupBy('id_convenio')
        ->where ('estado_ficha','=','3')
        ->get();
        return view("licasoft.reportes.create", compact("convenios"),['ficha'=>$ficha]);

    }
 




}
