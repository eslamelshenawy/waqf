<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApartment extends FormRequest
{

    public function rules()
    {
        return [
            'number' => [
                'required', 'max:255', 'unique:apartments'
            ],
            'building' => [
                'required', Rule::exists('buildings', 'number')
            ],
            'floor_number' => 'required|numeric|digits_between:1, 30',
            'number_of_rooms' => 'required|numeric|digits_between:1, 100',
            'space' => 'required|numeric',
            'number_of_kitchens' => 'required|numeric|digits_between:1, 10',
            'is_has_air_conditioner' => 'required|boolean',
            'is_kitchen_ready' => 'required|boolean',
            'extra_details' => 'sometimes|nullable',
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
            'number.required' => 'Apartment number is required',
            'space.required' => 'Apartment is required',
            'building.required' => 'Building is required',
            'floor_number.required' => 'Floor number is required',
            'floor_number.digits_between' => 'Up to floor number limit',
            'number_of_rooms.digits_between' => 'Rooms number is required',
            'is_has_air_condition.required' => 'Must be choose if you have air condition ability',
            'images.required' => 'Apartment images is required',
//            'images.mime' => 'Invalid images'

        ];
    }
}
