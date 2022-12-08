<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;


class UserController extends Controller
{
    
    public function indexuser(Request $request)
    {
        // $data['lists'] = User::all();
        $query = User::query();
        if (!empty($request->review))
            $query->where('review', 'LIKE', "%$request->review%");

        if (!empty($request->quality))
            $query->where('quality', 'LIKE', "%$request->quality%");

        if (!empty($request->price))
            $query->where('price', 'LIKE', "%$request->price%");

        if (!empty($request->value))
            $query->where('value', 'LIKE', "%$request->value%");

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->latest()->paginate($perPage);
        // pr($data['lists']);
        $request->request->remove('page');
        $request->request->remove('perPage');
        $data['filter']  = $request->all();

        
        return view('crm.customers.list', $data);
    }
}
