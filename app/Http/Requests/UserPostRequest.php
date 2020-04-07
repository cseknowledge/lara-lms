<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            'name'          =>      'required|string|max:25',
            'email'         =>      'required|string|email|max:255|unique:users,email,'.$this->id,
            'member_type'   =>      'required',
            'expiry_date'   =>      'required|after:yesterday',
            'password'      =>      'required|string|min:8'
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
            'name.required'           =>      'We want know book\'s name',
            'name.string'             =>      'Please provide a valid name',
            'email.max'               =>      'Maximum charecters length is 25',
            'email.required'          =>      'We want know email address',
            'email.string'            =>      'Please provide a valid email',
            'email.max'               =>      'Maximum charecters length is 225',
            'email.email'             =>      'Please provide a valid email',
            'email.unique'            =>      'This email already exists',
            'member_type.required'    =>      'Please provide user type',
            'expiry_date.required'    =>      'Please provide user expiry date',
            'expiry_date.after'       =>      'Expiry date is not acceptable before today',
            'password.required'       =>      'Please provide a password',
            'password.string'         =>      'Please provide a valid pawwsord',
            'password.min'            =>      'Minimum password length is 8'
        ];
    }
}
