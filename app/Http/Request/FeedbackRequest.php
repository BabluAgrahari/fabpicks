<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class FeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'review'       =>  'required',
            'quality'      =>  'required',
            'price'        =>  'required',
            'value'        =>  'required',
            'remarks'      =>  'required',
            // 'status'            =>  'required|string|in:success,fales'  
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validationRes($validator->errors()));
    }
}
