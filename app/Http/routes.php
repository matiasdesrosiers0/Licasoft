<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([ 'middleware' => 'cors'], function()
{
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/licasoft/movil','MovilController');
Route::resource('/licasoft/profesionales','ProfesionalesController');
Route::resource('/licasoft/traslados','TrasladosController');
Route::resource('/licasoft/convenios','ConveniosController');
Route::resource('/licasoft/ambulancias','AmbulanciasController');
Route::resource('/licasoft/ficha','FichaController');
Route::resource('/licasoft/fichaPendiente','FichaPendienteController');
Route::resource('/licasoft/fichaPeticion','FichaPeticionController');
Route::resource('/licasoft/cotizaciones','CotizacionesController');
Route::resource('/licasoft/reportes','ReportesController');
Route::resource('/licasoft/paciente','PacientesController');
Route::resource('/licasoft/deuda','DeudaController');


Route::auth();

Route::get('/licasoft', 'HomeController@index');
});

