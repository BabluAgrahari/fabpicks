<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('crm.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:2|max:255',
            'password' => 'required|min:6|max:16'
        ]);

        if ($validator->fails())
            return $this->validationRes($validator->messages());

        $credentials = $request->only('email', 'password');

        $token = JWTAuth::attempt($credentials);
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

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
