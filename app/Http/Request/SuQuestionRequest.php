<?php

namespace App\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SuQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $rule =  [
            'required'      => 'nullable|numeric|in:0,1',
            'survay_id'     => 'required',
            'survay_type'   => 'required|string|in:single_choise,multi_choise,yes_no,rating,upload_image,subjective_question',
            'survay_question'=> 'required|string|max:500',
            'reward'        => 'required|numeric|min:1|max:3000',
            'data'          => 'required|array',
        ];

        if ($request->survay_type == 'single_choise') {
            $rule['data.answer'] = 'nullable';
            $rule['data.option.*'] = 'required';
        } else if ($request->survay_type == 'multi_choise') {
            $rule['data.answer'] = 'nullable';
            $rule['data.option.*'] = 'required';
        } else if($request->survay_type =='upload_image') {
            $rule['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048';
        }

        return $rule;
    }

    public function messages()
    {
        if ($this->get('survay_type') == 'single_choise') {
            return [
                'data.option.0.required' => 'This filed is Required.',
                'data.option.1.required' => 'This filed is Required.',
                'data.option.2.required' => 'This filed is Required.',
                'data.option.3.required' => 'This filed is Required.',
            ];
        } else if ($this->get('survay_type') == 'multi_choise') {
            return [
                'data.option.0.required' => 'This filed is Required.',
                'data.option.1.required' => 'This filed is Required.',
                'data.option.2.required' => 'This filed is Required.',
                'data.option.3.required' => 'This filed is Required.',
            ];
        } else {
            return [];
        }
    }

    public function attributes()
    {
        return [
            'data.option.0' => 'email address',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors(), 'type' => $this->get('survay_type')))));
    }
}
