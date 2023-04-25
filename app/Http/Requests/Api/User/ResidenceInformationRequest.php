<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ResidenceInformationRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }







    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {


        $rules = [

            'street' => 'required',
            'region' => 'required',
            'city' => 'required',
            'country_id' => 'required|numeric|exists:countries,id',

        ];


        return $rules;
    }
}
