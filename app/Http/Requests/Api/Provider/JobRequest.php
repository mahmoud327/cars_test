<?php

namespace App\Http\Requests\Api\Provider;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest {

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
        $return = [
           'title'=>'nullable',
           'job_name'=>'nullable',
           'desc'=>'required',
           'company_name'=>'nullable',
           'service_category_id'=>'exists:service_categories,id',
           'expected_salary'=>'nullable|numeric',
           'required_experience'=>'nullable|numeric',
           'duration_contract'=>'numeric',

        ];
        return $return;
    }
}
