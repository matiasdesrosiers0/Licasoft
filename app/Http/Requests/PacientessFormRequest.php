<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class PacientessFormRequest extends Request
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
            'rut_paciente'=>'max|:12',
            'nombres'=>'required|max:200',
            'apellidos'=>'required|max:50',
            'edad'=>'required|max:50',
            'ocultar'=>'max:50',
        ];
    }
}
