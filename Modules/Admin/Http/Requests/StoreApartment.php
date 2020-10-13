<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApartment extends FormRequest
{

    public function rules()
    {
        return [
            'number' => [
                'required', 'max:255', 'unique:estates'
            ],
            'building' => [
                'required', Rule::exists('estates', 'id')
            ],
            'city' => 'required',
            'floor_number' => 'required|numeric|digits_between:1, 30',
            'number_of_rooms' => 'required|numeric|digits_between:1, 100',
            'space' => 'required|numeric',
            'number_of_kitchens' => 'required|numeric|digits_between:1, 10',
            'is_has_air_conditioner' => 'required|boolean',
            'is_kitchen_ready' => 'required|boolean',
            'kitchen_details' => 'sometimes|nullable',
            'price' => 'required|numeric',
            'is_has_parking' => 'required|boolean',
            'rent_type' => 'required', Rule::in([
                'monthly', 'quarterly', 'midterm', 'yearly'
            ]),
            'images' => 'required'
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
            'floor_number.required' => __('shared::validations.floor_number.required'),
            'floor_number.digits_between' => __('shared::validations.floor_number.digits_between'),
            'number_of_rooms.digits_between' => __('shared::validations.number_of_rooms.required'),
            'is_has_air_condition.required' => __('shared::validations.is_has_air_condition.required'),
            'images.required' => __('shared::validations.images.required'),
        ];
    }
}
