<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Traslados extends Model
{
    protected $table='ficha';

    protected $primaryKey='id_ficha';

    public $timestamps=false;


    protected $fillable =[
        'id_ficha',
        'nombre'
    ];

    protected $guarded =[

    ];

}
