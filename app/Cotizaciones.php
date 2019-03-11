<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    protected $table='cotizacion';

    protected $primaryKey='id_cotizacion';

    public $timestamps=false;


    protected $fillable =[
        'origen',
        'destino',
        'precio_base',
        'precio_combustible',
        'precio_hora',
        'precio_duracion',
        'precio_kilometro',
        'total'
    ];
       
   

    protected $guarded =[

    ];

}


