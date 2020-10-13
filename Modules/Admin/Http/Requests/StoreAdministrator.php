<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdministrator extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|max:20|min:3',
            'email' => 'required|unique:administrators|email',
            'password' => 'required|min:6|max:20|confirmed',
            'role_id' => ['nullable', 'sometimes', Rule::exists('roles', 'id')]
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
            'password.required' => __('shared::validations.password.required'),
            'password.confirmed' => __('shared::validations.password.confirmed'),
            'role_id.exists' => __('shared::validations.invalid_role')
        ];
    }
}
