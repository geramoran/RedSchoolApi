<?php

namespace App\Http\Requests\API;

use App\Models\taller_has_escuela;
use InfyOm\Generator\Request\APIRequest;

class Createtaller_has_escuelaAPIRequest extends APIRequest
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
        return taller_has_escuela::$rules;
    }
}
