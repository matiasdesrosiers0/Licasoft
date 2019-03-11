<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Profesionales extends Model
{
    protected $table='profesional';

    protected $primaryKey='id_profesional';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
        'cargo',
        'telefono',
        'ocultar'
    ];

    protected $guarded =[

    ];

}


