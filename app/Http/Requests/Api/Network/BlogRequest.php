<?php

namespace App\Http\Requests\Api\Network;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest {

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
            'categories' => 'required|exists:blog_categories,id',
            'ar.title'=>'required',
            'image'=>'required',
            'ar.description'=>'required',

        ];


        return $rules;
    }
}
