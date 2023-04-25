<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class CareerInformationRequest extends FormRequest {

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
            'job_title' => 'required',
            'year_experience' => 'required',
            'field_id' => 'required|exists:fileds,id',
            'year_experience' => 'required|numeric',

        ];


        return $rules;
    }
}
