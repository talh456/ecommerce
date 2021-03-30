<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use\App\Category;

class CategoryRequest extends FormRequest
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
            'title' => 'required | max:255',
            'category_image'=>'required | image | mimes:jpeg,png,jpg,gif|max:2048'
         
        ];

        if(request()->id)
        {
            
            $rule['title'] = ['required'];
            $rule['category_image'] = ['required','image','mimes:jpeg,png,jpg,gif'];

        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required'=>'Enter the Category title',
            'category_image.required'=>'Image is required',
            'category_image.image'=>'File must be image'   
        ];
    }
}
