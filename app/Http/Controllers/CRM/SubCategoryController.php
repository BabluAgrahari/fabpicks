<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sub_ProductCategory;
use App\Models\ProductCategory;
use App\Http\Request\SubCategoryRequest;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['lists'] = Sub_ProductCategory::all();
        $data['categories'] = ProductCategory::where('status',1)->get();
        return view('crm.SubCategory.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(SubCategoryRequest $request)
    {
        $save = new Sub_ProductCategory();
        $save->sub_category_name    = $request->sub_category_name;
        $save->discription          = $request->discription;
        $save->sort                 = $request->sort;
        $save->status               = (int)$request->status ?? '0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'SubCategory');

        if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'SubCategory');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Sub Category Added Successfully.']);

        return response(['status' => false, 'msg' => 'Sub Category not Added.']);
    }

    public function edit($id)
    {
        $record = Sub_ProductCategory::find($id);

        return response(['status' => true, 'record' => $record]);
    }

    public function update(SubCategoryRequest $request, $id)
    {
        $save = Sub_ProductCategory::find($id);
        $save->sub_category_name    = $request->sub_category_name;
        $save->discription          = $request->discription;
        $save->sort                 = $request->sort;
        $save->status               = (int)$request->status ?? '0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'SubCategory');

        if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'SubCategory');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Sub Category Update Successfully.']);

        return response(['status' => false, 'msg' => 'Sub Category not Update.']);
    }

    public function destroy($id)
    {
        $res = Sub_ProductCategory::destroy($id);
        if ($res)
            return response(['status' => true, 'msg' => 'Sub Category Removed Successfully.']);

        return response(['status' => false, 'msg' => 'Sub Category not Removed.']);
    }
}
