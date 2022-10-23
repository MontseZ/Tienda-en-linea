<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return[
            'descripcion.required'=>'Este campo es requerido.',
            'descripcion.string'=>'El valor no es correcto.',
            'descripcion.max'=>'Máximo 255 caracteres.',
        ];
}
}
