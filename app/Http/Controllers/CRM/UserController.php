<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->dateRange()->latest()->paginate($perPage);
        
        unset($request['perPage']);
        unset($request['page']);
        $data['filter'] = $request->all();

        return view('crm.customers.list', $data);
    }


    public function profile()
    {
        $data['res'] = User::find(Auth::user()->_id);
        return view('crm.profile', $data);
    }

    public function update(Request $request)
    {
        $update = User::find(Auth::user()->_id);
        $update->name        = $request->fname;
        $update->lname       = $request->lname;
        $update->phone       = $request->phone;

        //for profile pic upload
        if (!empty($request->file('profile_img')))
            $update->profile_img  = singleFile($request->file('profile_img'), 'user');

        if ($update->save())
            return response(['status' => true, 'msg' => 'Profile Updated Successfully.']);

        return response(['status' => false, 'msg' => 'Profile not Updated.']);
    }
}
