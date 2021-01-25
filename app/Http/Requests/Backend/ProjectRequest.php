<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required|unique:projects|max:255',
            'image' => 'required',
            'url' => 'required',
            'body' => 'required',

        ];

    }

    public function messages()
    {
        return [
            'category_id' => 'Please select category',
            'title' => 'Please enter title!',
            'image' => 'Please choose image!',
            'url' => 'Please input project URL!',
        ];

    }
}
