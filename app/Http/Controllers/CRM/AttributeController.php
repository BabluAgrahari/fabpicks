<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Http\Request\Product_AttributeRequest;

class AttributeController extends Controller
{
    public function index()
    {   
        $data['lists'] =ProductAttribute::all();
        return view('crm.attribute.list',$data);
    }

    public function store(Product_AttributeRequest $request)
    {
        $save= new ProductAttribute();
        $save->category_name    =$request->category_name;
        $save->discription      =$request->discription;
        $save->sort             =$request->sort;
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
        $record = ProductAttribute::find($id);
        return response(['status'=>true,'record'=>$record]);
    }

    public function update(Request $request, $id)
    {
        $save= ProductAttribute::find($id);
        $save->category_name    =$request->category_name;
        $save->discription      =$request->discription;
        $save->sort             =$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'attribute');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'attribute');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Attribute Added Successfully.']);

        return response(['status' => false, 'msg' => 'Attribute not Added.']);
    }

    public function destroy($id)
    {
        //
    }
}
