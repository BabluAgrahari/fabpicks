<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CouponRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $return = [
            'coupon_code' => 'required|string|min:2|max:30',
            'coupon_qty'  => 'required|numeric|min:1|max:100',
            'expiry'      => 'required',
            'status'      => 'required',
            'cart_value'  => 'required|numeric|min:1|max:50000',
            'discount_type' => 'nullable|string|in:flat,percantage'
        ];

        if (!empty($request->amount))
            $return['amount'] = 'required|numeric|min:1|max:10000';

        if (!empty($request->percentage))
            $return['percentage'] = 'required|numeric|min:1';

        return $return;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
