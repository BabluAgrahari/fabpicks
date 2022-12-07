<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Request\ClientRequest;
use App\Models\User;
use App\Models\Brand;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        try {

            $query = Client::userAccess();

            if (!empty($request->store_name))
                $query->where('store_name', 'LIKE', "%$request->store_name%");

                if (!empty($request->email))
                $query->where('email', 'LIKE', "%$request->email%");

                if (!empty($request->phone))
                $query->where('phone', 'LIKE', "%$request->phone%");

                if (!empty($request->state))
                $query->where('state', 'LIKE', "%$request->state%");

                if (!empty($request->city))
                $query->where('city', 'LIKE', "%$request->city%");

                if (!empty($request->pincode))
                $query->where('pincode', 'LIKE', "%$request->pincode%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();
            $data['brands'] = Brand::get();
            return view('crm.Client.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(ClientRequest $request)
    {
        try {
            $save = new Client();
            $save->Brand_id          = $request->Brand_id;
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
                return response(['status' => false, 'msg' => 'Client Store not Added.']);

            $data = ['name' => $request->store_name, 'email' => $request->email, 'password' => $request->password];
            $this->register($data); //for register new client

            return response(['status' => true, 'msg' => 'Client Store Added Successfully.']);
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
            $save->Brand_id   = $request->Brand_id;
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
