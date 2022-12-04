<?php

namespace App\Http\Controllers\crm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Request\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $data['lists']= Category::all();
        return view('crm.category.list',$data);
    }

    public function store(CategoryRequest $request)
    {
        $save= new Category();
        $save->name             =$request->name;
        $save->discription      =$request->discription;
        $save->sort             =(int)$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'category');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'category');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Category Added Successfully.']);
        return response(['status' => false, 'msg' => 'Category not Added.']);
    }
 
    public function edit($id)
    {
        $record = Category::find($id);
        return response(['status'=>true,'record'=>$record]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $save=Category::find($id);
        $save->name             =$request->name;
        $save->discription      =$request->discription;
        $save->sort             =(int)$request->sort;
        $save->status           =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'category');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'category');
            
            if ($save->save())
            return response(['status' => true, 'msg' => 'Category Update Successfully.']);

        return response(['status' => false, 'msg' => 'Category not Update.']);
    }

    public function destroy($id)
    {
        $res = Category::destroy($id);
        if ($res)
            return response(['status' => true, 'msg' => 'Category Removed Successfully.']);

        return response(['status' => false, 'msg' => 'Category not Removed.']);
    }
}
