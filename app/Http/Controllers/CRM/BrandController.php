<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Request\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
class BrandController extends Controller
{
    public function index()
    {
        $data['lists'] = Brand::all();
        return view('crm.brand.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(BrandRequest $request)
    {
        $save = new Brand();
        $save->brand_name = $request->brand_name;
        $save->sort       = (int)$request->sort;
        $save->status     = (int)$request->status ?? 0;
        // $save->general_setting = $request->general_setting;

        //for logo upload
        if (!empty($request->file('logo')))
            $save->logo  = singleFile($request->file('logo'), 'brand');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Brand Added Successfully.']);

        return response(['status' => false, 'msg' => 'Brand not Added.']);
    }

    public function edit($id)
    {
        $record = Brand::find($id);

        return response(['status' => true, 'record' => $record]);
    }

    public function update(BrandRequest $request, $id)
    {
        $save = Brand::find($id);
        $save->brand_name = $request->brand_name;
        $save->sort       = (int)$request->sort;
        $save->status     = (int)$request->status ?? 0;

        //for logo upload
        if (!empty($request->file('logo')))
            $save->logo  = singleFile($request->file('logo'), 'brand');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Brand Updated Successfully.']);

        return response(['status' => false, 'msg' => 'Brand not Updated.']);
    }

    public function destroy($id)
    {
        $res = Brand::destroy($id);
        if ($res)
            return response(['status' => true, 'msg' => 'Brand Removed Successfully.']);

        return response(['status' => false, 'msg' => 'Brand not Removed.']);
    }
}
