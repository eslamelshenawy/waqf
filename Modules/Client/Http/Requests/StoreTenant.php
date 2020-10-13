<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTenant extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:100'
            ],
            'email' => [
                'max:80', 'unique:users'
            ],
            'mobile' => [
                'required', 'numeric', 'unique:users', 'min:11'
            ],
            'identity_number' => [
                'required', 'numeric', 'unique:users'
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
            ],
            'city' => 'required',
            'check_agree' => 'required',
            'is_has_kids' => 'required|boolean',



        ];
    }

//'state' => 'exists:states'


//    public function rules()
//    {
//        return [
//            'name' => 'required|max:100',
//            'email' => 'required|unique:users',
//            'mobile' => 'required|unique:users',
//            'identity_number' => 'required|max:10',
//            'nationality' => 'required',
//            'birth_of_date_at' => 'required|date',
//            'release_at' => 'required|date|after:birth_of_date_at',
//            'end_at' => 'required|date|after:release_at',
//            'password' => 'required|confirmed|min:6',
//            'company_owner_name' => 'required',
//            'job' => 'required',
//            'job_title' => 'required',
//            'bank_id' => 'required',
//            'bank_account_number' => 'required',
//            'marital_status' => 'required',
//            'is_has_kids' => 'required|boolean'
//        ];
//    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => __('shared::validations.name.required'),
            'email.unique' => __('shared::validations.name.unique'),
            'mobile.required' => __('shared::validations.mobile.required'),
            'mobile.unique' => __('shared::validations.mobile.unique'),
            'mobile.regex' => __('shared::validations.mobile.regex'),
            'identity_number.required' => __('shared::validations.identity_number.required'),
            'identity_number.unique' => __('shared::validations.identity_number.unique'),
            'identity_number.numeric' => __('shared::validations.identity_number.numeric'),
            'job.required' => __('shared::validations.job.required'),
            'check_agree.required' => __('shared::validations.check_agree.required'),
            'password.required' => __('shared::validations.password.required'),
            'password.confirmed' => __('shared::validations.password_confirmation.not_match'),
            'city.required' => __('shared::validations.city.required'),
            'is_has_kids.required' => __('shared::validations.kids.required'),
            'is_has_kids.boolean' => __('shared::validations.boolean'),
            'birth_of_date_at.required' => __('shared::validations.birth_of_date_at.required'),
            'release_at.required' => __('shared::validations.release_at.required'),
            'release_at.date' => __('shared::validations.release_at.date'),
            'end_at.required' => __('shared::validations.end_at.required'),
            'end_at.date' => __('shared::validations.end_at.date'),
            'martial_status.required' => __('shared::validations.martial_status.required')

        ];
    }
}
