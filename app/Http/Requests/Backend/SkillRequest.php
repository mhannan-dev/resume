<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'title' => 'required|unique:skills|max:255',
            'choose_platform' => 'required',
            'expertise_level' => 'required',

        ];
        return $rules;

    }

    public function messages()
    {
        return [
            'title' => 'Please enter title!',
            'choose_platform' => 'Please choose platform!',
            'choose_platform' => 'Please choose expertise level!',

        ];

    }
}
