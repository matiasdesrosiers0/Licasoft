<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class ProfesionalesFormRequest extends Request
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
            'nombre'=>'required|max:50',
            'cargo'=>'required|max:200',
            'telefono'=>'required|max:50',
            'ocultar'=>'max:50',
        ];
    }
}
