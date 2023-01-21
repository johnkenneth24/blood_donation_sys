<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'date.required' => 'Date is required',
            'image.image' => 'Image must be a valid image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'Image may not be greater than 3048 kilobytes',
        ];
    }
}
