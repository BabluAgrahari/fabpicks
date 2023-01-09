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
                    'amount'                        => 'required|numeric',
                    'tax_amount'                    => 'required|numeric',
                    'trail_point'                   => 'required|numeric',
                    'status'                        => 'required|string|in:success,pending',
                    'shipping_cost'                 => 'nullable',
                    'shipping_details.name'         =>  'required|string|min:2|max:200',
                    'shipping_details.email'        =>  'required|string|email|min:2|max:200',
                    'shipping_details.phone'        =>  'required|numeric|digits:10',
                    'shipping_details.city'         =>  'required|string|min:2|max:200',
                    'shipping_details.state'        =>  'required|string|min:2|max:200',
                    'shipping_details.pincode'      =>  'required|numeric|digits:6',
                    'shipping_details.address'      =>  'required|string|min:2|max:200',
                    'billing_details.name'          =>  'required|string|min:2|max:200',
                    'billing_details.email'         =>  'required|string|email|min:2|max:200',
                    'billing_details.phone'         =>  'required|numeric|digits:10',
                    'billing_details.city'          =>  'required|string|min:2|max:200',
                    'billing_details.state'         =>  'required|string|min:2|max:200',
                    'billing_details.pincode'       =>  'required|numeric|digits:6',
                    'billing_details.address'       =>  'required|string|min:2|max:200',
                    'products.*.product_id'         =>  'required',
                    'products.*.name'               =>  'required|min:2|max:200',
                    'products.*.mrp'                =>  'required',
                    'products.*.qty'                =>  'required|numeric',
                    'products.*.sku'                =>  'required|min:2|max:100'

                ];
            }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validationRes($validator->errors()));
    }
}
