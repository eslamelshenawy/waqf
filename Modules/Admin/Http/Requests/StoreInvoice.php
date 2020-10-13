<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoice extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:100'
            ],
            'email' => [
                'sometimes', 'nullable', 'max:80', 'unique:users', 'unique:agencies', 'unique:administrators'
            ],
            'mobile' => [
//                'required', 'numeric', 'unique:users', 'unique:agencies', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'
            ],
            'identity_number' => [
                'required', 'numeric', 'unique:users', 'unique:beneficiaries', 'unique:agencies'
            ],
            'birth_of_date_at' => [
                'required', 'date', 'before:today'
            ],
            'release_at' => [
                'required', 'date', 'before:today'
            ],
            'end_at' => [
                'required', 'date', 'after:release_at'
            ],
            'job' => [
                'required', Rule::in([
                    'government_employee',
                    'private_sector_employee',
                    'businessman',
                    'free_business',
                    'retired'
                ])
            ],
            'password' => [
                'required',
                'confirmed',
                'min:6', 'max:30'
            ],
            'marital_status' => [
                'required',
                Rule::in([
                    'single',
                    'married',
                    'widower',
                    'divorcee'
                ])
            ]


        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => __('shared::validations.name.required'),
            'email.unique' => __('shared::validations.email.unique'),
            'mobile.required' => __('shared::validations.mobile.required'),
            'mobile.unique' => __('shared::validations.mobile.unique'),
            'mobile.regex' => __('shared::validations.mobile.regex'),
            'identity_number.required' => __('shared::validations.identity_number.required'),
            'identity_number.unique' => __('shared::validations.identity_number.unique'),
            'password.required' => __('shared::validations.password.required'),
            'birth_of_date_at.required' => __('shared::validations.birth_of_date_at.required'),
            'birth_of_date_at.before:today' => __('shared::validations.birth_of_date_at.before'),
            'city.required' => __('shared::validations.city.required'),
            'release_at.required' => __('shared::validations.release_at.required'),
            'release_at.date' => __('shared::validations.release_at.date'),
            'release_at.before:today' => __('shared::validations.before'),
            'end_at.required' => __('shared::validations.end_at.required'),
            'end_at.date' => __('shared::validations.end_at.date'),
            'job.required' => __('shared::validations.job.required'),
        ];
    }
}
