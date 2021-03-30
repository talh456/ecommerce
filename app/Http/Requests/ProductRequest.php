<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required | numeric',
            'product_image' => 'required | image | mimes:jpeg,png,jpg,gif|max:2048'


         
        ];

        if(request()->id)
        {
            
            $rule['title'] = ['required'];
            $rule['price'] = ['required','numeric'];
            $rule['product_image'] = ['required','image','mimes:jpeg,png,jpg,gif'];

        }
        return $rule;
    }

    public function messages()
    {
        return [
            'title.required'=>'Enter the Product title',
            'price.required' => 'Enter Product Price',
            'price.numeric' => 'Enter price in numeric values',
            'product_image.required'=>'Image is required',
            'product_image.image'=>'File must be image'
            
          
        ];
    }
}
