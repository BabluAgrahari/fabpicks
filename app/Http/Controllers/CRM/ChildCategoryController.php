<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use App\Models\ProductCategory;
use App\Http\Request\CategoryRequest;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $data['lists'] = ChildCategory::all();
         $data['categories'] = ProductCategory::where('status',1)->get();
         $data['subcategories'] = SubCategory::where('status',1)->get();
        //  pr($data['categories']);
        return view('crm.childCategory.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        $save = new ChildCategory(); 
        $save->sub_category_id      = $request->sub_category_id;
        $save->category_id          = $request->category_id;
        $save->child_category_name  = $request->child_category_name;
        $save->discription          = $request->discription;
        $save->sort                 = $request->sort;
        $save->status               = (int)$request->status ?? '0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'chindCategory');

        if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'chindCategory');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Child Category Added Successfully.']);

        return response(['status' => false, 'msg' => 'Child Category not Added.']);
    }

    public function edit($id)
    {
        $record = ChildCategory::find($id);

        return response(['status' => true, 'record' => $record]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $save = ChildCategory::find($id);
        $save->sub_category_id      = $request->sub_category_id;
        $save->category_id          = $request->category_id;
        $save->child_category_name  = $request->child_category_name;
        $save->discription          = $request->discription;
        $save->sort                 = $request->sort;
        $save->status               = (int)$request->status ?? '0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'chindCategory');

        if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'chindCategory');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Child Category Update Successfully.']);

        return response(['status' => false, 'msg' => 'Child Category not Update.']);
    }

    public function destroy($id)
    {
       
    }
}
