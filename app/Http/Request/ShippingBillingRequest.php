<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ShippingBillingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        //  pr($request->all());die;
        if ($request->same_billing) {
            return [
                'billing_name'                => 'required|string',
                'billing_landmark'            => 'required|string',
                'billing_phone'               => 'required|digits:10',
                'billing_city '               => 'nullable|string',
                'billing_state '              => 'nullable|string',
                'billing_address '            => 'nullable|string',
                'billing_pincode '            => 'nullable|numeric|digits:6',
                'billing_alternate_phone'     => 'required|digits:10'
            ];
              
        } else {
            return [
                    
                'shipping_name'                => 'required|string',
                'shipping_landmark'            => 'required|string',
                'shipping_phone'               => 'required|digits:10',
                'shipping_city '               => 'nullable|string',
                'shipping_state '              => 'nullable|string',
                'shipping_address '            => 'nullable|string',
                'shipping_pincode '            => 'nullable|numeric|digits:6',
                'shipping_alternate_phone'     => 'required|digits:10',
              
                'shipping_name'                => 'required|string',
                'shipping_landmark'            => 'required|string',
                'shipping_phone'               => 'required|digits:10',
                'shipping_city '               => 'nullable|string',
                'shipping_state '              => 'nullable|string',
                'shipping_address '            => 'nullable|string',
                'shipping_pincode '            => 'nullable|numeric|digits:6',
                'shipping_alternate_phone'     => 'required|digits:10'
            ];
               
                
     
         
                }
    }

    protected function failedValidation(Validator $validator)
    {
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
