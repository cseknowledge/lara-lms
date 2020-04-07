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
            'book_name'        =>      'required|string|max:25',
            'author_id'        =>      'required',
            'publisher_id'     =>      'required',
            'price'            =>      'required|numeric'
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
            'book_name.max'                =>      'Maximum charecters length is 25',
            'author_id.required'           =>      'Please provide author name',
            'publisher_id.required'        =>      'Please provide publisher name',
            'price.required'               =>      'Please provide book\'s price',
            'price.numeric'                =>      'Please provide valid price'
        ];
    }
}
