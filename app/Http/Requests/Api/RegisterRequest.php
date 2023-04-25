<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class RegisterRequest extends FormRequest
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
        return [

            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'phone'         => 'required|min:10|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
