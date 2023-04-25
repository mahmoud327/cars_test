<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class PaymentCardRequest extends FormRequest
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

        $rules = [

            'card_holder' => 'required',
            'card_number' => 'required|numeric',
            'expiryYear' => 'required|numeric',
            'expiryMonth' => 'required|numeric',
            'card_cvv' => 'required|numeric',

        ];

        return $rules;
    }
}
