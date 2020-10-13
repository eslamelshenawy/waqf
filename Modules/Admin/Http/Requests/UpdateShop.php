<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShop extends FormRequest
{

    public function rules()
    {
        return [
            'number' => [
                'required', 'max:255'
            ],
            'building' => [
                'required'
            ],
            'space' => 'required|numeric',
            'price' => 'required|numeric',
            'is_on_street_front' => 'required|boolean',
            'is_has_air_conditioner' => 'required|boolean',
            'is_has_decoration' => 'required|boolean',
            'is_has_license' => 'required|boolean',
            'is_has_warehouse' => 'required|boolean',
            'rent_type' => 'required', Rule::in([
                'monthly', 'quarterly', 'midterm', 'yearly'
            ]),
            'commercial_activities' => 'required',
//            'images' => ['required', 'mimes:jpg,jpeg,png']
//            'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'number.required' => __('shared::validations.number.required'),
            'number.unique' => __('shared::validations.number.unique'),
            'space.required' => __('shared::validations.space.required'),
            'building.required' => __('shared::validations.building.required'),
            'city.required' => __('shared::validations.city.required'),
            'is_on_street_front.required' => __('shared::validations.is_on_street_front.required'),
            'is_has_air_conditioner.required' => __('shared::validations.is_has_air_conditioner.required'),
            'is_has_decoration.required' => __('shared::validations.is_has_decoration.required'),
            'is_has_license.required' => __('shared::validations.is_has_license.required'),
            'rent_type.required' => __('shared::validations.rent_type.required'),
            'is_has_warehouse.required' => __('shared::validations.is_has_warehouse.required'),
            'images.required' => __('shared::validations.images.required'),
            'commercial_activities.required' => __('shared::validations.commercial_activities.required')
        ];
    }
}
