<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookIssuedPostRequest extends FormRequest
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
            'issue_date'     =>      'required|after:yesterday|before:return_date',
            'return_date'    =>      'required|after:today|after:issue_date',
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
            'issue_date.required'        =>      'Please put a issue date',
            'issue_date.after'           =>      'Issue date is not acceptable before today',
            'issue_date.before'          =>      'Issue date must be less than from return date',
            'return_date.required'       =>      'Please put a return date',
            'return_date.after'          =>      'Return date is not acceptable before today',
            'return_date.before'         =>      'Return date must be less than from issue date'
        ];
    }
}
