<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'full_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'subject' => 'required|max:255',
            'message' => 'required',

        ];
        return $rules;

    }

    public function messages()
    {
        return [
            'full_name' => 'Please enter full name!',
            'mobile_no' => 'Please enter mobile no',
            'email' => 'Please enter email',
            'subject' => 'Please enter subject',
            'message' => 'Please enter message'

        ];

    }
}
