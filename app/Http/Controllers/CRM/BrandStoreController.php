<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\BrandStore;
use Illuminate\Http\Request;
use App\Http\Request\BrandStoreRequest;

class BrandStoreController extends Controller
{
    public function index()
    {
        $data['lists']=BrandStore::all();
        return view('crm.brandstore.list',$data);
    }

    public function create()
    {
        //
    }

    public function store(BrandStoreRequest $request)
    {
        $save = new BrandStore();
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
            $save->logo  = singleFile($request->file('logo'), 'brandstore');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Brand Store Added Successfully.']);

        return response(['status' => false, 'msg' => 'Brand Store not Added.']);
    }

    public function edit($id)
    {
        $record = BrandStore::find($id);
        return response(['status' => true, 'record' => $record]);
    }

    public function update(BrandStoreRequest $request, $id)
    {
        $save = BrandStore::find($id);
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
            $save->logo  = singleFile($request->file('logo'), 'brandstore');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Brand Store Update Successfully.']);

        return response(['status' => false, 'msg' => 'Brand Store not Update.']);
    }

    public function destroy($id)
    {
        //
    }
}
