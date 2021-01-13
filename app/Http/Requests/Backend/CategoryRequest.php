<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'title' => 'required',
            'type' => 'required',
            'status' => 'required' 

        ];
        return $rules;

    }

    public function messages()
    {
        return [
            'title' => 'Please enter full name!',
            'type' => 'Please select type',
            'status' => 'Please select status',
            
            

        ];

    }
}
