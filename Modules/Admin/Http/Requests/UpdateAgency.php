<?php

namespace Modules\Admin\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAgency extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:100', 'string'
            ],
            'type' => [
                'required', Rule::in(['person', 'agency'])
            ],
            'identity_number' => [
                'required', 'unique:agencies,identity_number,' . $this->route('agency'),
                'unique:users', 'unique:beneficiaries'
            ],
            'email' => [
                'required', 'email', 'max:80', 'unique:agencies,email,' . $this->route('agency'),
                'unique:administrators', 'unique:beneficiaries', 'unique:users'
            ],
            'mobile' => [
                'required', 'numeric',
                'unique:agencies,mobile,' . $this->route('agency'),
                'unique:users', 'unique:beneficiaries',
//                'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'
            ],
            'address' => [
                'required', 'sometimes', 'nullable', 'max:300'
            ],
            // 'password' => [
            //     'required', 'min:6', 'max:20', 'confirmed'
            // ],
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
            'name.required' => __('shared::validations.name.required'),
            'name.min' => __('shared::validations.name.min'),
            'name.max' => __('shared::validations.name.max'),
            'identity_number.required' => __('shared::validations.identity_number.required'),
            'identity_number.unique' => __('shared::validations.identity_number.unique'),
            'email.required' => __('shared::validations.email.unique'),
            'email.unique' => __('shared::validations.email.unique'),
            'mobile.required' => __('shared::validations.mobile.required'),
            'mobile.unique' => __('shared::validations.mobile.unique'),
            'mobile.regex' => __('shared::validations.mobile.regex'),
            'password.required' => __('shared::validations.password.required'),
            'password.confirmed' => __('shared::validations.password.confirmed'),
            'password.min' => __('shared::validations.password.min'),
            'password.max' => __('shared::validations.password.max'),
            'address.max' => __('shared::validations.address.max'),
            'services.required' => __('shared::validations.services.required'),
            'city.required' => __('shared::validations.city.confirmed'),
            'city.exists' => __('shared::validations.city.exists'),
            'services.in' => __('shared::validations.services.in')
        ];
    }
}
