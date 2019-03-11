<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
    protected $table='movil';

    protected $primaryKey='id_movil';

    public $timestamps=false;


    protected $fillable =[
    	'id_profesional_conductor',
        'id_profesional_paramedico',
        'id_profesional_medico',
        'id_profesional_paramedico',
        'id_profesional_enfermero',
        'id_profesional_regulador'
    ];

    protected $guarded =[

    ];

}

