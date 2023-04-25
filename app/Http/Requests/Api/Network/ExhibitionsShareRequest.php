<?php

namespace App\Http\Requests\Api\Network;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionsShareRequest extends FormRequest {

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
            'brand_name'=>'required',
            'type_products'=>'required',
            'desc'=>'required',
            'rental_price'=>'required|numeric',
            'insurance_price'=>'required|numeric',
            'number_persons'=>'required|numeric',
            'number_days_booking'=>'required|numeric',
            'booth_type'=>'required',
            'media' => 'required|max:5000',
           'exhibition_id'=>'required|exists:exhibitions,id'

        ];


        return $rules;
    }
}
