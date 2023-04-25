<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class NotificationSettingRequest extends FormRequest {

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
            'meeting_notification' => 'required|numeric|max:1',
            'meeting_notification' => 'required|numeric|max:1',
            'attachments_notification' => 'required|numeric|max:1',
            'blogs_notification' => 'required|numeric|max:1',

        ];


        return $rules;
    }
}
