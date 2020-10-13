<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreBuilding extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'max:255', 'unique:estates'
            ],
            'number' => [
                'required', 'numeric', 'unique:estates'
            ],
            'city' => ['required', Rule::exists('cities', 'name_en')],
            'district' => 'required|max:255',
            'street' => 'required|max:255',
            'space' => 'required|numeric',
            'number_of_apartments' => 'required|numeric',
            'number_of_floors' => 'required|numeric',
            'number_of_shops' => 'required|numeric',
            'instrument_number' => 'required|numeric',
            'instrument_date_at' => 'required|date',
            'usage_type' => 'required',
            'rent_type' => 'required',
            'court' => 'required',
            'price' => 'required|numeric',
            'instrument_image' => 'required',
            'building_license_image' => 'required',
//            'instrument_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
//            'building_license_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
//            'building_image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'construction_license_date_at' => 'required|date',
            'construction_license_number' => 'required'
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
            'number.required' => __('shared::validations.number.required'),
            'court.required' => __('shared::validations.court.required'),
            'number.unique' => __('shared::validations.number.unique'),
            'usage_type.required' => __('shared::validations.building_type.required'),
            'rent_type.required' => __('shared::validations.rent_type.required'),
            'space.required' => __('shared::validations.space.required'),
            'city.required' => __('shared::validations.city.required'),
            'district.required' => __('shared::validations.district.required'),
            'street.required' => __('shared::validations.street.required'),
            'number_of_apartments.required' => __('shared::validations.number_of_apartments.required'),
            'number_of_apartments.numeric' => __('shared::validations.number_of_apartments.numeric'),
            'instrument_number.required' => __('shared::validations.instrument_number.required'),
            'instrument_number.numeric' => __('shared::validations.instrument_number.numeric'),
            'instrument_date_at.required' => __('shared::validations.instrument_date_at.required'),
            'instrument_date_at.date' => __('shared::validations.instrument_date_at.date'),
            'instrument_image.required' => __('shared::validations.instrument_image.required'),
            'instrument_image.mimes' => __('shared::validations.instrument_image.mimes'),
            'instrument_image.max' => __('shared::validations.instrument_image.max'),
            'building_license_image.required' => __('shared::validations.building_license_image.required'),
            'building_license_image.mimes' => __('shared::validations.building_license_image.mimes'),
            'building_license_image.max' => __('shared::validations.building_license_image.max'),
            'construction_license_number.required' => __('shared::validations.construction_license_number.required'),
            'building_image.required' => __('shared::validations.building_image.required'),
            'building_image.mimes' => __('shared::validations.building_image.mimes'),
            'building_image.max' => __('shared::validations.building_image.required'),
            'construction_license_date_at.required' => __('shared::validations.construction_license_date_at.required'),
            'construction_license_date_at.date' => __('shared::validations.construction_license_date_at.date'),
            'price.required' => __('shared::validations.price.required'),
            'price.numeric' => __('shared::validations.price.numeric')
        ];
    }
}
