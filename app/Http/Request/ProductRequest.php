<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request as HttpRequest;
use App\Traits\Response;

class ProductRequest extends FormRequest
{
    use Response;
    public function authorize()
    {
        return true;
    }

    public function rules(HttpRequest $request)
    {
        // if ($request->isMethod('post')) {
        //     return [
        //         'sort'          => 'required|numeric|min:1',
        //     ];
        // } else {
            return [

                'name'                  => 'required|string|min:2|max:30',
                'description'           => 'required',
                // 'size'                  => 'required|numeric',
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
                'thumbnail'             => 'nullable',
                'expire_date'           => 'required'

            ];
        // }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
