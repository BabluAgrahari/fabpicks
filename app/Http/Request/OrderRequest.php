<?php

namespace App\Http\Request;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class OrderRequest extends FormRequest
{
    use Response;

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'order_date'            => 'required',
            'amount'                =>  'required',
            'fix_amount'            =>  'required',
            'shipping_details'      =>  'required',
            'billing_details'       =>  'required',
            'products'              =>  'required',
            'status'                =>  'required|string|in:success,pending,false'


        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validationRes($validator->errors()));
    }
}
