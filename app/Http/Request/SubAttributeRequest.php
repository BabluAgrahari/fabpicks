<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class SubAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules() 
    {
        return [
            'attribute_id'      => 'required',
            'name'              => 'required|string|min:2|max:30',
            'sort'              => 'required|numeric',
            'status'            => 'nullable|numeric|in:0,1'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
