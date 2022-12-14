<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users|min:3|max:255',
            'phone' => 'required|numeric|digits:10',
            'gender' => 'required|in:male,female',
            'married' => 'required|in:yes,no'
        ]);

        if ($validator->fails())
            return $this->validationRes($validator->messages());

        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->gender = $request->gender;
        $save->married = $request->married;
        $save->role = 'customer';
        if ($save->save())
            return $this->successRes('Account Created Successfully.');

        return $this->failRes('Account not Created.');
    }
}
