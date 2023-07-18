<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function response(array $errors)
    // {

    //     if ($this->expectsJson()) {
    //         return new JsonResponse($errors, 422);
    //     }

    // }
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

                         'email'      => 'nullable',
                        'password'    => 'required|min:8',
               ];
    }
}
