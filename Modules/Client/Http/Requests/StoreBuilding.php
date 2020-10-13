<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreBuilding extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'required', 'max:255', 'unique:buildings'
            ],
            'number' => [
                'required', 'numeric', 'unique:buildings'
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
            'price' => 'required|numeric',
            'construction_license_date_at' => 'required|date'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Building name is required',
            'number.required' => 'Building number is required',
            'number.unique' => 'This number is already existed',
            'building_type.required' => 'Building type is required',
            'space.required' => 'Building space is required', 'city.required' => 'City is required',
            'district.required' => 'District is required',
            'street.required' => 'Street is required',
            'number_of_apartments.required' => 'Number of apartments is required',
            'number_of_apartments.numeric' => 'Number of apartments must be number value',
            'instrument_number.required' => 'Instrument is required',
            'instrument_number.numeric' => 'Instrument must be number value',
            'instrument_date_at.required' => 'Instrument is required',
            'instrument_date_at.date' => 'Instrument must be date value',
            'instrument_image.required' => 'Instrument image is required',
            'instrument_image.mimes' => 'instrument image is invalid image',
            'instrument_image.max' => 'instrument image is invalid image size',

            'building_license_image.required' => 'Building license image is required',
            'building_license_image.mimes' => 'Building license image is invalid image',
            'building_license_image.max' => 'Building license image is invalid image size',

            'building_image.required' => 'Building image is required',
            'building_image.mimes' => 'Building image is invalid image',
            'building_image.max' => 'Building image is invalid image size',

            'construction_license_date_at.required' => 'Construction license date is required',
            'construction_license_date_at.date' => 'Construction must be date value',

            'building_price.required' => 'Building price is required',
            'building_price.numeric' => 'Building must be has numeric value'

        ];
    }
}
