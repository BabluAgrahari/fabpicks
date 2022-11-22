<?php

namespace App\Http\Controllers\CRM\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {

        return view('crm.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|min:2|max:255',
            'password' => 'required|min:6|max:16'
        ]);

        $credentails = $request->only('email', 'password');

        if (Auth::attempt($credentails)) {

            return redirect()->intended('crm/dashboard');
        }
        return back()->with('error', 'invalid credentails');
    }
}
