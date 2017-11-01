<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'headline' => 'required',
            'description' => 'required|max:255',
            'cover' => 'nullable|mimes:jpeg,jpg,png',
            'salary' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|numeric',
            'website' => 'nullable|url',
            'age' => 'required|numeric'
        ];
    }
}
