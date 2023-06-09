<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class ContactInfoRequest extends FormRequest {

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
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'phone' => 'required|unique:users,phone,'.auth()->id(),

        ];


        return $rules;
    }
}
