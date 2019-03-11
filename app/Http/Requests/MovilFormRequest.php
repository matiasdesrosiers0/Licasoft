<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class MovilFormRequest extends Request
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
            'id_profesional_conductor'=>'required|max:50',
            'id_profesional_paramedico'=>'required|max:200',
            'id_profesional_medico'=>'required|max:50',
            'id_profesional_enfermero'=>'required|max:50',
            'id_profesional_regulador'=>'required|max:50',
        ];
    }
}
