<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'package_id' => 'required|numeric',
            'type' => 'required|in:0,1',
            'payment_id' => 'required_if:type,1|exists:user_payment_cards,id',
            'cvv' => 'required_if:type,0|numeric',
            'card_holder' => 'required_if:type,0|string',
            'expiryMonth' => 'required_if:type,0|numeric',

            'expiryYear' => 'required_if:type,0|numeric',
            'card_number' => 'required_if:type,0|numeric',
            'paymentBrand' => 'required_if:type,0|string',

        ];

        return $rules;
    }
}
