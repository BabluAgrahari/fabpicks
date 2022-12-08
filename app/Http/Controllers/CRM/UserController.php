<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;


class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $query = User::query();

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->dateRange()->latest()->paginate($perPage);
        
        $request->request->remove('page');
        $request->request->remove('perPage');
        $data['filter']  = $request->all();

        
        return view('crm.customers.list', $data);
    }
}
