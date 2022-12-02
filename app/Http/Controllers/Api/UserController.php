<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\http\Request\UserRequest;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{
    public function update(UserRequest $request ,$id)
    {
        $save = User::find($id);
        $save->name = $request->name;
        $save->email = $request->email;
        $save->city = $request->city;
        $save->state = $request->state;
        $save->pincode = $request->pincode;
        $save->address = $request->address;
        // $save->role = 'customer';
        if (!empty($request->file('image')))
        $save->image  = singleFile($request->file('image'), 'user');

        if ($save->save())
            return $this->successRes('Account Created Successfully.');

        return $this->failRes('Account not Created.');
    }

    public function show($id){
        try {
    $record = User::find($id);
        return $this->successRes($record);
    } catch (Exception $e) {
        return $this->failRes($e->getMessage());
    }

}
}
