<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CheckEndDateEstateOrder extends FormRequest
{

    public function rules()
    {
        return [
//            'booking_at' => 'required|date|before:today',
            'Date_end' => 'required|date|after:booking_at',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'booking_at.required' => 'booking_at Required',
            'ended_at.required' => 'تاريخ انتهاء الحجز لابد ان يكون بعد تاريخ الحجز  ',
        ];
    }
}
