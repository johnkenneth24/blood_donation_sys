<?php

namespace App\Http\Requests\Donors;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required'],
            'middlename' => ['nullable'],
            'lastname' => ['required'],
            'age' => ['required', 'numeric'],
            'gender' => ['required'],
            'address' => ['required'],
            'contact_no' => ['required', 'numeric'],
            'bloodtype' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'age.required' => 'Age is required',
            'age.numeric' => 'Age must be a number',
            'gender.required' => 'Gender is required',
            'address.required' => 'Address is required',
            'contact_no.required' => 'Contact number is required',
            'contact_no.numeric' => 'Contact number must be a number',
        ];
    }
}
