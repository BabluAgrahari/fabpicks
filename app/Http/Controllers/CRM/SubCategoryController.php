<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Request\SubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['lists'] = SubCategory::all();
        $data['categories'] = Category::where('status',1)->get();
        return view('crm.SubCategory.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(SubCategoryRequest $request)
    {
        $save = new SubCategory(); 
        $save->category_id          = $request->category_id;
        $save->name                 = $request->name;
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
        $record = SubCategory::find($id);

        return response(['status' => true, 'record' => $record]);
    }

    public function update(SubCategoryRequest $request, $id)
    {
        $save = SubCategory::find($id);
        $save->category_id          = $request->category_id;
        $save->name                 = $request->name;
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
        $res = SubCategory::destroy($id);
        if ($res)
            return response(['status' => true, 'msg' => 'Sub Category Removed Successfully.']);

        return response(['status' => false, 'msg' => 'Sub Category not Removed.']);
    }
}
