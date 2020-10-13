<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLand extends FormRequest
{

    public function rules()
    {
        return [
            'number' => [
                'required', 'max:255', 'unique:estates'
            ],
            'space' => 'required|numeric',
            'price' => 'required|numeric',
            'location' => 'required',
            'instrument_number' => 'required|numeric',
            'instrument_date_at' => 'required|date|before:today',
            'court' => 'required',
            'city' => 'required', Rule::exists('cities', 'name_en'),
            'land_type' => 'required', Rule::in(['residential', 'commercial']),
            'extra_details' => 'sometimes|nullable',
            'district' => 'required',
            'street' => 'required',
            'images' => 'required'
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
            'city.required' => 'Please select the city for land',
            'city.exists' => 'Invalid city not in cities list',
            'number.required' => 'Land number is required',
            'space.required' => 'Land is required',
            'space.numeric' => 'Must be land space is number value',
//            'beneficiary.required' => 'User is required',
            'price.required' => 'Land number is required',
            'price.numeric' => 'Must price has a decimal value',
            'land_type.required' => 'Must be choose land type',
            'land_type.in' => 'Invalid choice for land type',
            'court.required' => 'Court is required',
            'district.required' => 'Please type district land',
            'street.required' => 'Please input land street',
            'instrument_number.required' => 'Land instrument land is required',
            'instrument_date_at.required' => 'Land instrument date at is required',
            'instrument_date_at.date' => 'Land instrument date must be date value',
            'instrument_date_at.before' => 'Land instrument date must be before date today',
            'images.required' => 'Land images is required',
        ];
    }
}
