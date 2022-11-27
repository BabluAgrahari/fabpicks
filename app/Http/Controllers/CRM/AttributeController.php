<?php

namespace App\Http\Controllers\crm;
use App\Http\Controllers\Controller;
use App\Http\Request\AttributeRequest;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {   
        $data['lists'] =Attribute::all();
        return view('crm.attribute.list',$data);
    }

    public function store(AttributeRequest $request)
    {
        $save= new Attribute();
        $save->name             =$request->name;
        $save->sort             =(int)$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'attribute');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'attribute');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Attribute Added Successfully.']);

        return response(['status' => false, 'msg' => 'Attribute not Added.']);
    }

    public function edit($id)
    {
        $record = Attribute::find($id);
        return response(['status'=>true,'record'=>$record]);
    }

    public function update(AttributeRequest $request, $id)
    {
        $save= Attribute::find($id);
        $save->name             =$request->name;
        $save->sort             =(int)$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'attribute');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'attribute');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Attribute Update Successfully.']);

        return response(['status' => false, 'msg' => 'Attribute not Update.']);
    }

    public function destroy($id)
    {
        //
    }
}
