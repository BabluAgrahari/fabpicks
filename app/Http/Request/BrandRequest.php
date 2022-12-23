<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required|string|min:2|max:30',
            'logo'        => 'nullable',
            'sort'        => 'required|numeric',
            'description' => 'required',
            'status'      => 'nullable|numeric|in:0,1'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
