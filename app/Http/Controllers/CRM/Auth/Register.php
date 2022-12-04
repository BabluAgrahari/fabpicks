<?php

namespace App\Http\Controllers\CRM\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    //
    public function index()
    {
        return view('crm.register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users|min:3|max:255',
            'password'=> 'required|min:6|max:16'
        ]);

        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->role = 'admin';
        if(!$save->save())
        return redirect()->back()->whit('error','Account not Created.');

        //for store user id as a parent id in user collection
        $id = $save->_id;
        $user = User::find($id);
        $user->parent_id = $id;
        $user->save();
        
        return redirect('/')->with('success','Account Created Successfully.');

    }

    public function show()
    {
        $data['lists'] = User::all();
        return view('crm.customers.list',$data);
    }

}
