<?php

namespace App\Http\Controllers\CRM\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    //
    public function index(){

        return view('crm.register');
    }


    public function register(Request $request){

        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->save();

        echo 'Register Successfully';
    }
}
