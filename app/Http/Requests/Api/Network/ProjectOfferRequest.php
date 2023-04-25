<?php

namespace App\Http\Requests\Api\Network;

use Illuminate\Foundation\Http\FormRequest;

class ProjectOfferRequest extends FormRequest {

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
            'invest_project_id' => 'required|numeric|exists:invest_projects,id',
            'rent' => 'required|numeric',
            'address'=>'required',
            'place_area'=>'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb

        ];


        return $rules;
    }
}
