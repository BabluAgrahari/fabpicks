<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users|min:3|max:255',
            'city'  =>  'required',
            'state' =>  'required',
            'pincode'=> 'required|numeric|digits:6',
            'address'=> 'required|min:2|max:500'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }

    
}
