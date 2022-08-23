<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationRequest extends FormRequest
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
            'name' => 'required|string',
            'dob' => 'date|required',
            'gender' => 'required|string|max:1',
            'email' => 'required|email|unique:students,email',
            'school_id' => 'required|integer',
            'hostel_id' => 'required|integer',
            'username' => 'required|max:255|regex:/^[0-9a-z._]+$/|unique:students,username',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            //school
            'school_id.required' => "Please select your school",
            'school_id.integer' => "Please select your school",

            //hostel
            'hostel_id.required' => "Please select your hostel",
            'hostel_id.integer' => "Please select your hostel",
        ];
    }
}
