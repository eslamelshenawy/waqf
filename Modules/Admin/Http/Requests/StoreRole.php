<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRole extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|unique:roles',
        ];
    }


    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Role name is required',
            'name.unique' => 'Name is already existed'
        ];
    }
}
