<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'name'                  => 'required|string|min:2|max:30',
            'description'           => 'required',
            'size'                  => 'required|numeric',
            'product_type'          => 'required',
            // 'trial_point'           => 'required',
            'sale_price'            => 'nullable|numeric',
            'rewards_point'         => 'required',
            'sub_category'          => 'required',
            'brand_id'              => 'required',
            // 'no_feedback'           => 'required',
            // 'pre_qulifing_question' => 'nubale',
            'mrp'                   => 'nullable|numeric',
            'offer_price'           => 'required|numeric',
            'maximum_qty'           => 'required|numeric',
            'thumbnail'             => 'required',
            'expire_date'           => 'required'
            
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
