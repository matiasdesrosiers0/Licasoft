<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class AmbulanciasFormRequest extends Request
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
            'modelo'=>'required|max:50',
            'marca'=>'required|max:200',
            'combustible'=>'required|max:50',
            'año'=>'required|max:50',
            'estado'=>'required|max:50',
            'otros'=>'required|max:50',
            'ocultar'=>'max:50',
        ];
    }
}
