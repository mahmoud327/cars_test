<?php

namespace App\Http\Requests\Api\Provider;

use Illuminate\Foundation\Http\FormRequest;

class ApplyJobRequest extends FormRequest {

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
            'job_id'=>'required|exists:provider_jobs,id',
            'note'=>'required',
            "cv" => "required|mimes:pdf,docx|max:10000"

        ];
        return $return;
    }
}
