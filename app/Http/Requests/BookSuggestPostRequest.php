<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookSuggestPostRequest extends FormRequest
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
            'book_name'             =>      'required|string|max:25',
            'author_name'           =>      'required|string|max:25',
            'publisher_name'        =>      'required|string|max:25',
            'short_description'     =>      'max:255'
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
            'book_name.required'             =>      'We want know book\'s name',
            'book_name.string'               =>      'Please provide a valid name',
            'book_name.max'                  =>      'Maximum charecters length is 25',
            'author_name.required'           =>      'We want know author\'s name',
            'author_name.string'             =>      'Please provide a valid name',
            'author_name.max'                =>      'Maximum charecters length is 25',
            'publisher_name.required'        =>      'We want know publisher\'s name',
            'publisher_name.string'          =>      'Please provide a valid name',
            'publisher_name.max'             =>      'Maximum charecters length is 25',
            'short_description.max'          =>      'Maximum charecters length is 255'
        ];
    }
}
