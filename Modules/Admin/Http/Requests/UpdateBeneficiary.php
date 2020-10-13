<?php

namespace Modules\Admin\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBeneficiary extends FormRequest
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
                'sometimes', 'nullable', 'max:80',
                'unique:beneficiaries,email, ' . $this->route('beneficiary'), 'unique:administrators'
            ],
            'mobile' => [
                'required', 'numeric', 'unique:beneficiaries,mobile,'. $this->route('beneficiary')
            ],
            
            'identity_number' => [
                'required', 'numeric', 'unique:beneficiaries,identity_number,' . $this->route('beneficiary'), 'unique:users'
            ],
            'birth_of_date_at' => [
                'required', 'date', 'before:today'
            ],
            'release_at' => 'required|date',
            'end_at' => 'required|date|after:release_at',
            'city' => 'required',
            'bank_account_number' => 'required',
            'bank_iban_number' => 'required'
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
            'birth_of_date_at.before:today' => __('shared::validations.birth_of_date_at.before_today'),
            'bank_account_number' => __('shared::validations.bank_account_number.required'),
            'bank_iban_number' => __('shared::validations.bank_iban_number.required'),
            'city.required' => __('shared::validations.city.required'),
            'release_at.required' => __('shared::validations.release.required'),
            'release_at.date' => __('shared::validations.release.date'),
            'release_at.before:today' => __('shared::validations.release_at.before_today'),
        ];
    }
}
