<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Ambulancias extends Model
{
    protected $table='ambulancia';

    protected $primaryKey='id_ambulancia';

    public $timestamps=false;


    protected $fillable =[
    	'modelo',
        'marca',
        'combustible',
        'kmxlitro',
        'año',
        'estado',
        'otros',
        'ocultar'
    ];

    protected $guarded =[

    ];

}


