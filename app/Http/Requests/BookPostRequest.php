<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
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
            'book_name'        =>      'required|string|max:25'
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
            'book_name.required'           =>      'We want know book\'s name',
            'book_name.string'             =>      'Please provide a valid name',
            'book_name.max'                =>      'Maximum charecters length is 25'
        ];
    }
}
