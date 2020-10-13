<?php

namespace Modules\Admin\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTenant extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:100'
            ],
            'email' => [
                'sometimes', 'nullable', 'max:80',
                'unique:users,email, ' . $this->route('tenant'), 'unique:administrators'
            ],
//            'mobile' => [
//                'required', 'numeric', 'unique:users,mobile,'. $this->route('tenant'), 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'
//            ],
            // 'password' => [
            //     'required', 'min:6', 'max:20', 'confirmed'
            // ],
            'identity_number' => [
                'required', 'numeric', 'unique:users,identity_number,' . $this->route('tenant'), 'unique:beneficiaries'
            ],
            'birth_of_date_at' => [
                'required', 'date', 'before:today'
            ],
            'release_at' => [
                'required', 'date'
            ],
            'end_at' => [
                'required', 'date', 'after:release_at'
            ],
            'city' => 'required',
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
            'end_at.required' => __('shared::validations.birth_of_date_at.required'),
            'end_at.date' => __('shared::validations.end_at.date'),
            'birth_of_date_at.before:today' => __('shared::validations.birth_of_date_at.before'),
            'city.required' => __('shared::validations.city.required'),
            'release_at.required' => __('shared::validations.release.required'),
            'release_at.date' => __('shared::validations.release.date'),
            'release_at.before:today' => __('shared::validations.release_at.before'),
        ];
    }
}
