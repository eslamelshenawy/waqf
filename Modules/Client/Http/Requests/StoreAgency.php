<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgency extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:100', 'string'
            ],
            'company_name' => [
                'required', 'min:3', 'max:100', 'string'
            ],
            'type' => [
                'required', Rule::in(['person', 'agency'])
            ],
            'identity_number' => [
                'required', 'unique:agencies', 'unique:beneficiaries', 'unique:users'
            ],
            'email' => [
                'sometimes', 'nullable', 'email', 'max:80', 'unique:agencies', 'unique:administrators'
            ],
            'mobile' => [
                'required', 'numeric', 'unique:agencies', 'min:11'
            ],
            'address' => [
                'required', 'sometimes', 'nullable', 'max:300'
            ],
            'password' => [
                'required', 'min:6', 'max:20', 'confirmed'
            ],
            'city' => [
                'required', Rule::exists('cities', 'name_en')
            ],
            'services' => 'required', Rule::in([
                'electric', 'plumber', 'carpenter', 'painter', 'paving', 'transfer_furniture', 'uploading_and_downloading', 'cleaning', 'other'
            ])

        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Should name greater than 3 letters',
            'name.max' => 'Should name less than 100 letters',
            'name.required' => 'Company Name is required',
            'name.min' => 'Should company name greater than 3 letters',
            'name.max' => 'Should company name less than 100 letters',
            'identity_number.required' => 'Identity number is required',
            'identity_number.unique' => 'Identity number is already existed',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already existed',
            'mobile.required' => 'Mobile is required',
            'mobile.unique' => 'Mobile already existed',
            'mobile.regex' => 'Invalid mobile number',
            'password.required' => 'Password required',
            'password.confirmed' => 'Password not match',
            'password.min' => 'Password must be greater than 6 characters',
            'password.max' => 'Password must be less than 20 charaters',
            'address.max' => 'Should address less than 300 character',
            'services.required' => 'Services is required',
            'city.required' => 'City is required',
            'city.exists' => 'City is not exists',
            'services.in' => 'These service not available'

        ];
    }
}
