<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table='paciente';

    protected $primaryKey='rut_paciente';

    public $timestamps=false;


    protected $fillable =[
        'rut',
        'nombres',
        'apellidos',
        'edad',
        'sexo',
        'id_convenio',
        'ocultar'
        
    ];

    protected $guarded =[

    ];

}


