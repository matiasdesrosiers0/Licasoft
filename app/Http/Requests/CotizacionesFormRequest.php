<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class CotizacionesFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'origen'=>'max:50',
            'destino'=>'max:200',
            'precio_base'=>'max:50',
            'precio_combustible'=>'max:50',
            'precio_hora'=>'max:50',
            'precio_duracion'=>'max:50',
            'precio_kilometro'=>'max:50',
            'total'=>'max:50',
        ];
    }
}
