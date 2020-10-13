<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermission extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|unique:permissions'
        ];
    }


    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'name.required' => 'Permission name is required',
            'name.unique' => 'Permission is already existed'
        ];
    }
}
