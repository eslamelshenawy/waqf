<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoremaintenanceOrder extends FormRequest
{

    public function rules()
    {
        return [
//            'city' => ['required', Rule::exists('cities', 'name_en')],
//            'description' => 'required',
//            'username' => 'required|max:255',
////            'date' => 'required',
//            'apartmentId' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'username.required' => 'username Required',
            'description.required' => 'Description Required',
            'city.required' => __('shared::validations.city.required'),
        ];
    }
}
