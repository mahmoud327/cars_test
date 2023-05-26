<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'year' => 'required|string',
            'mileage' => 'required|string',
            'price' => 'required|string',
            'engine_size' => 'required|string',
            'vin_number' => 'required|string',
            'make_id' => 'required|integer',
            'model_id' => 'required|integer',
           'images'=>'required|array',

        ];
    }
}
