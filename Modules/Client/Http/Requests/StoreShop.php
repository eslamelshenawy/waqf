<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreShop extends FormRequest
{

    public function rules()
    {
        return [
            'number' => [
                'required', 'max:255', 'unique:shops'
            ],
            'building' => [
                'required', Rule::exists('buildings', 'number')
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
            'images' => 'required',
//            'commercial_activities' => 'required',
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
            'shop_number.required' => 'Shop number is required',
            'shop_space.required' => 'Apartment is required',
            'shop_space.numeric' => 'Must be shop space is number value',
            'building.required' => 'Building is required',
            'shop_price.required' => 'Shop number is required',
            'shop_price.numeric' => 'Must price has a decimal value',
            'floor_number.digits_between' => 'Up to floor number limit',
            'is_on_street_front.required' => 'Must be determine if shop on street front or not',
            'is_has_air_condition.required' => 'Must be choose if you have air condition ability',
            'is_has_license.required' => 'Must be determine if license existed or not',
            'is_has_warehouse.required' => 'Must be determine if shop have warehouse',
            'images.required' => 'Shop images is required',
//            'commercial_activities' => 'Must be determine which commercial activities for shop'
        ];
    }
}
