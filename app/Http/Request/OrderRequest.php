<?php

namespace App\Http\Request;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class OrderRequest extends FormRequest
{
    use Response;

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        if ($request->isMethod('put')) {
            return [
                'status' =>  'required|string|in:cancel'
            ];
        } else {

            return [
                'order_date'                    => 'required',
                'amount'                        =>  'required',
                'tax_amount'                    =>  'required',
                'status'                        =>  'required|string|in:success,pending,cancel',
                'shipping_details.name'         =>  'required',
                'shipping_details.email'        =>  'required',
                'shipping_details.phone'        =>  'required',
                'shipping_details.city'         =>  'required',
                'shipping_details.state'        =>  'required',
                'shipping_details.pincode'      =>  'required',
                'shipping_details.address'      =>  'required',
                'billing_details.name'          =>  'required',
                'billing_details.email'         =>  'required',
                'billing_details.phone'         =>  'required',
                'billing_details.city'          =>  'required',
                'billing_details.state'         =>  'required',
                'billing_details.pincode'       =>  'required',
                'billing_details.address'       =>  'required',
                'products.*.name'               =>  'required',
                'products.*.price'              =>  'required',
                'products.*.qty'                =>  'required',
                'products.*.sku'                =>  'required'

            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validationRes($validator->errors()));
    }
}
