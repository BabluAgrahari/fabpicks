<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'coupon_code' => 'required|string|min:2|max:30',
            'coupon_qty'  => 'required|numeric|min:1|max:100',
            'expiry'      => 'required',
            'amount'      => 'required|numeric|min:1|max:10000',
            'status'      => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
