<?php

namespace Modules\Admin\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiary extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', 'max:100'
            ],
            'bank_id' => [
                'required'
            ],
            'email' => [
                'required', 'max:80', 'unique:beneficiaries', 'unique:users', 'unique:administrators'
            ],
            'mobile' => [
                'required', 'numeric', 'unique:beneficiaries', 'unique:users'
            ],
            'identity_number' => [
                'required', 'numeric', 'unique:beneficiaries', 'unique:users'
            ],
            'birth_of_date_at' => [
                'required', 'date', 'before:today'
            ],
            'password' => [
                'required', 'min:6', 'max:20', 'confirmed'
            ],
            'release_at' => 'required|date|before:today',
            'end_at' => 'required|date',
            'bank_account_number' => 'required',
            'bank_iban_number' => 'required',
            'city' => 'required',
            'job' => 'required'
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
            'email.required' => __('shared::validations.email.required'),
            'email.unique' => __('shared::validations.email.unique'),
            'mobile.required' => __('shared::validations.mobile.required'),
            'mobile.unique' => __('shared::validations.mobile.unique'),
            'mobile.regex' => __('shared::validations.mobile.regex'),
            'identity_number.required' => __('shared::validations.identity_number.required'),
            'identity_number.unique' => __('shared::validations.identity_number.unique'),
            'password.required' => __('shared::validations.password.required'),
            'birth_of_date_at.required' => __('shared::validations.birth_of_date_at.required'),
            'birth_of_date_at.before:today' => __('shared::validations.birth_of_date_at.before'),
            'bank_account_number' => __('shared::validations.bank_account_number.required'),
            'bank_iban_number' => __('shared::validations.bank_iban_number.required'),
            'city.required' => __('shared::validations.city.required'),
            'release_at.required' => __('shared::validations.release_at.required'),
            'end_at.required' => __('shared::validations.end_at.required'),
            'end_at.date' => __('shared::validations.end_at.date'),
            'release_at.date' => __('shared::validations.release_at.date'),
            'release_at.before:today' => __('shared::validations.release_at.before'),
            'job.required' => __('shared::validations.job.required'),
        ];
    }
}
