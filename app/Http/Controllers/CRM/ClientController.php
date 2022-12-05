<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Request\ClientRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        try {
            $data['lists'] = Client::all();
            return view('crm.Client.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(ClientRequest $request)
    {
        try {
            $save = new Client();
            $save->store_owner          = $request->store_owner;
            $save->store_name           = $request->store_name;
            $save->email                = $request->email;
            $save->gstin                = $request->gstin;
            $save->phone                = $request->phone;
            $save->mobile               = $request->mobile;
            $save->address              = $request->address;
            $save->country              = $request->country;
            $save->state                = $request->state;
            $save->city                 = $request->city;
            $save->pincode              = $request->pincode;
            $save->store                = (int)$request->store ?? 0;
            $save->verified_store       = (int)$request->verified_store;

            //for logo upload
            if (!empty($request->file('logo')))
                $save->logo  = singleFile($request->file('logo'), 'Client');

            if (!$save->save())
                return response(['status' => false, 'msg' => 'Brand Store not Added.']);

            $data = ['name' => $request->store_name, 'email' => $request->email, 'password' => $request->password];
            $this->register($data); //for register new client

            return response(['status' => true, 'msg' => 'Brand Store Added Successfully.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Client::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(ClientRequest $request, $id)
    {
        try {
            $save = Client::find($id);
            $save->store_owner   = $request->store_owner;
            $save->store_name    = $request->store_name;
            $save->email         = $request->email;
            $save->gstin         = $request->gstin;
            $save->phone         = $request->phone;
            $save->mobile        = $request->mobile;
            $save->address       = $request->address;
            $save->country       = $request->country;
            $save->state         = $request->state;
            $save->city          = $request->city;
            $save->pincode       = $request->pincode;
            $save->store         = (int)$request->store ?? 0;

            //for logo upload
            if (!empty($request->file('logo')))
                $save->logo  = singleFile($request->file('logo'), 'Client');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Brand Store Update Successfully.']);

            return response(['status' => false, 'msg' => 'Brand Store not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }

    //for register a client in user Collection
    private function register($request = array())
    {
        if (empty($request))
            return false;

        $request = (object)$request;
        $save = new User();
        $save->name  = $request->name;
        $save->email = $request->email;
        $save->role  = 'client';
        $save->parent_id = Auth::user()->_id;
        $save->password = Hash::make($request->password);
        if ($save->save())
            return true;

        return false;
    }
}
