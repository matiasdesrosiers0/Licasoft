<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    protected $table='users';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	'name',
        'direccion',
        'telefono',
        'ubicacion',
        'tipo'
    ];

    protected $guarded =[

    ];

}

