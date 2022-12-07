<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginOtpController extends Controller
{

    public function otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|numeric|digits:10',
        ]);

        if ($validator->fails())
            return $this->validationRes($validator->messages());

        # Generate An OTP
        $verificationCode = $this->generateOtp($request->mobile_no);
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
        $update->otp = rand(1234,9999);
        $update->expire_at = strtotime(Carbon::now()->addMinutes(5));

        if ($update->save())
            return ['otp' => $update->otp, 'mobile_no' => $update->mobile_no, 'expire_at' => $update->expire_at, 'expire_time' => '5 minutes'];

        return false;
    }


    public function verifyOtp(Request $request)
    {
        #Validation
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|numeric|digits:10',
            'otp' => 'required|numeric|digits:4'
        ]);

        if ($validator->fails())
            return $this->validationRes($validator->messages());

        #Validation Logic
        $user = User::where([['mobile_no', $request->mobile_no], ['otp', $request->otp]])->first();
        // pr($user);
        if (empty($user))
            return $this->unauthorizedRes('Your OTP is not correct.');

        if (empty($user)) {
            return $this->unauthorizedRes('Your OTP is not correct.');
        } elseif ($user && time() >= $user->expire_at) {
            return $this->unauthorizedRes('Your OTP has been expired.');
        }

        if (!empty($user)) {
            // Expire The OTP
            $update = User::find($user->_id);
            $update->expire_at = strtotime(Carbon::now());
            $update->save();
            // Auth::login($update);

            $token = JWTAuth::fromUser($update);
            if (!$token)
                return $this->unauthorizedRes('Invalid Credentials.');

            return response()->json([
                'status' => true,
                'code' => 200,
                'user' => Auth::user(),
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }

        return $this->unauthorizedRes('Your OTP is not correct.');
    }

    public function register($mobile_no)
    {
        $save = new User();
        $save->mobile_no = $mobile_no;
        $save->trail_point = (int)6;
        // $save->email = $request->email;
        // $save->password = Hash::make($request->password);
        $save->role = 'customer';
        if ($save->save())
            return $save;

        return false;
    }
}
