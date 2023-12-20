<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        dd($this->user());
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:10'],
            'last_name' => ['required', 'string', 'max:10'],
            "phone_number" => ['nullable', 'string'],
            'website' => ['nullable', 'url'],
            'dob' => ['nullable', 'date', 'before:today'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'about_me' => ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'first_name.max' => 'First name must not be more than 10 characters',
        ];
    }
}
