<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRegisterRequest extends FormRequest
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
        $rule = [
            //
            'name'=>'required | max:255',
            'email'=>'required | email | max:255 | unique:users',
            'password'=>'required | min:8',
            'password_confirmation'=>'required | same:password'
           ];

       
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required'=>'Enter your name',
            'email.required'=>'Please Enter your Email',
            'password_confirmation.same'=>'Your password does not match',
            'password.required'=>'Please enter the password',
            'password.min'=>'Password must have atleast 8 characters',
            'password_confirmation.required'=>'Please confirm your password'

        ];
    }
}

