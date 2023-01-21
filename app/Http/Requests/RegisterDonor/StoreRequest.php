<?php

namespace App\Http\Requests\RegisterDonor;

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
            'lastname' => ['required'],
            'middlename' => ['nullable'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'contact_no' => ['required', 'min:10', 'max:15'],
            'blood_type' => ['nullable'],
            'gender' => ['required'],
            'bdate' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must have a valid email format (e.g. example@example.com)',
            'address.required' => 'Address is required',
            'contact_no.required' => 'Contact number is required',
            'gender.required' => 'Gender is required',
            'bdate.required' => 'Birthdate is required',
            'status.required' => 'Status is required',
        ];
    }
}
