<?php

namespace App\Http\Request;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

class CartRequest extends FormRequest
{
    use Response;

    public function authorize()
    {
        return true;
    }

    public function rules(HttpRequest $request)
    {
        if ($request->isMethod('put')) {
            return [
                'qty'          => 'required|numeric',
            ];
        } else {
            return [
                'product_id'   => 'required',
                'qty'          => 'required|numeric',
                'code'         => 'nullable',
            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validationRes($validator->errors()));
    }
}
