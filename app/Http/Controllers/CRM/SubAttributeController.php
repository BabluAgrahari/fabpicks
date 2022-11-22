<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\SubAttribute;
use App\Http\Request\SubAttributeRequest;
use Illuminate\Http\Request;

class SubAttributeController extends Controller
{
    public function index()
    {
        $data['lists']=SubAttribute::all();
        return view('crm.subattribute.list',$data);
    }

    public function store(SubAttributeRequest $request)
    {
        $save= new SubAttribute();
        $save->category_name    =$request->category_name;
        $save->discription      =$request->discription;
        $save->sort             =$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'subattribute');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'subattribute');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Sub Attribute Added Successfully.']);

        return response(['status' => false, 'msg' => 'Sub Attribute not Added.']);
    }

    public function edit($id)
    {
        $record = SubAttribute::find($id);
        return response(['status'=>true,'record'=>$record]);
    }

    public function update(SubAttributeRequest $request, $id)
    {
        $save= SubAttribute::find($id);
        $save->category_name    =$request->category_name;
        $save->discription      =$request->discription;
        $save->sort             =$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'subattribute');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'subattribute');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Sub Attribute Update Successfully.']);

        return response(['status' => false, 'msg' => 'Sub Attribute not Update.']);
    }

    public function destroy($id)
    {
        //
    }
}
