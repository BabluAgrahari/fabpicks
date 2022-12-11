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
                'order_date'            => 'required',
                'amount'                =>  'required',
                'fix_amount'            =>  'required',
                'shipping_details'      =>  'required',
                'billing_details'       =>  'required',
                'products'              =>  'required',
                'status'                =>  'required|string|in:success,pending,cancel'


            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validationRes($validator->errors()));
    }
}
