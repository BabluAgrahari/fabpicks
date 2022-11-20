<?php

namespace App\Http\Controllers\CRM\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    //
    public function index()
    {

        return view('crm.login');
    }

    public function login(Request $request)
    {
        $credentails = $request->only('email', 'password');
        if (Auth::attempt($credentails)) {

            return redirect()->intended('crm.dashboard');
        }
        return back()->with('error', 'invalid credentails');
    }
}
