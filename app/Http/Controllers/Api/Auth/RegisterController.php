<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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
        $save->mobile_no = $request->phone;
        $save->gender = $request->gender;
        $save->married = $request->married;
        $save->role = 'customer';
        if ($save->save()) {
            return $this->otp($save->mobile_no);
            // return $this->successRes('Account Created Successfully.');
        }

        return $this->failRes('Account not Created.');
    }



    public function otp($mobile_no)
    {
        # Generate An OTP
        $verificationCode = $this->generateOtp($mobile_no);
        # Return With OTP 
        return $this->successRes($verificationCode);
    }

    public function generateOtp($mobile_no)
    {
        $user = User::where('mobile_no', $mobile_no)->first();
        if (empty($user))
            $user = $this->register($mobile_no);

        $id = $user->_id;
        $update = User::find($id);
        $update->otp = rand(1234, 9999);
        $update->expire_at = strtotime(Carbon::now()->addMinutes(5));

        if ($update->save())
            return ['otp' => $update->otp, 'mobile_no' => $update->mobile_no, 'expire_at' => $update->expire_at, 'expire_time' => '5 minutes', 'msg' => 'Account Created Successfully.'];

        return false;
    }
}
