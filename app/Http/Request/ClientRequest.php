<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'store_owner'    => 'required|string|min:2|max:30',
            'store_name'     => 'required|string|min:2|max:30',
            'email'          => 'required|email',
            'gstin'          => 'required|min:15|max:15',
            'phone'          => 'required|digits:10',
            'mobile'         => 'required|digits:10',
            'address'        => 'required',
            'country'        => 'required',
            'state'          => 'required',
            'city'           => 'required',
            'pincode'        => 'required|numeric|digits:6',
            'store'          => 'nullable|numeric|in:0,1',
            'verified_store' => 'required|numeric|in:0,1',
            'password'       => !empty($request->password) ? 'required|min:6|max:16' : 'nullable'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
