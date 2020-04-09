<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookReviewPostRequest extends FormRequest
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
            'book_id'        =>      'required',
            'user_id'        =>      'required',
            'book_review'    =>      'required|string|max:1000',
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
            'book_id.required'           =>      'Please select a book',
            'user_id.required'           =>      'Please select a user',
            'book_review.required'       =>      'Please provide a minimum book review text',
            'book_review.string'         =>      'Please provide a valid book review',
            'book_review.max'            =>      'Maximum charecters length is 1000'
        ];
    }
}
