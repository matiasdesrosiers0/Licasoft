<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table='ficha';

    protected $primaryKey='id_ficha';

    public $timestamps=false;


    protected $fillable =[
        'id_convenio',
        'fecha',
        'id_rut_paciente',
        'tipo',
        'requerimientos',
        'id_movil',
        'observacion',
        'origen',
        'destino',
        'precio_base',
        'precio_combustible',
        'precio_hora',
        'precio_duracion',
        'precio_kilometro',
        'precio_tiempo_extra',
        'total',
        'hora_llegada',
        'hora_420',
        'hora_llegada_qth',
        'hora_salida_qth',
        'precio_tiempo_extra',
        'hora_despacho',
        'estado_movil',
        'estado_ficha'
        
        
    ];

    protected $guarded =[

    ];

}


