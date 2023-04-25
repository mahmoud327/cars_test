<?php

namespace App\Http\Requests\Api\Network;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionsRequest extends FormRequest {

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
            "is_share" => "nullable|in:1,0",
            // 'booth_name' => 'required_if:is_share,1',
            // 'rental_price' => 'required_if:is_share,1',
            // 'rental_price' => 'required_if:is_share,1',
            // 'notice_peoples' => 'required_if:is_share,1',
            // 'insurance_price' => 'required_if:is_share,1',

            "content" => "required",
            "price" => "required|numeric",


        ];


        return $rules;
    }


}
