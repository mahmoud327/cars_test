<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'slug' => ['nullable', 'regex:/^[a-z0-9-]+$/', 'max:191', 'unique:pages,slug'],
        ];

        foreach (config('translatable.locales') as $locale)
        {
            $rules+= [$locale. '.title' => ['required', 'max:190']];
            $rules+= [$locale. '.content' => ['required']];

        }

        if( in_array("PUT", request()->route()->methods) ){
            $rules['slug'] = ['nullable', 'regex:/^[a-z0-9-]+$/','unique:pages,slug,'.$this->route('page') ??'' ];
        }
        return $rules;
    }
}
