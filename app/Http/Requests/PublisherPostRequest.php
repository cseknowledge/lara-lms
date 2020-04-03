<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherPostRequest extends FormRequest
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
            'publisher_name'        =>      'required|string|max:25'
        ];
    }

    /**
     * Get the validation message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'publisher_name.required'           =>      'We want know your name',
            'publisher_name.string'             =>      'Please provide a valid name',
            'publisher_name.max'                =>      'Maximum charecters length is 25'
        ];
    }
}
