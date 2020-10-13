<?php

namespace Modules\Client\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdvance extends FormRequest
{

    public function rules()
    {
        return [
            'd' => [
                'required', 'after:today'
            ],
        ];
    }


    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'd.required' => __('shared::validations.release_at.after'),
        ];
    }
}
