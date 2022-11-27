<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\ProductAdd;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductAddController extends Controller
{
   
    public function index()
    {
        $data['categories']=Category::where('status',1)->get();
        $data['subcategories']=SubCategory::where('status',1)->get();
        $data['childcategories']=ChildCategory::where('status',1)->get();
        $data['brands']= Brand::where('status',1)->get();
    //    pr($data['brands']);
        return view('crm.addProduct.list',$data);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $save= new ProductAdd();
        $save->prodcut_name             =$request->prodcut_name;
        $save->brand_id                 =$request->brand_id;
        $save->category_id              =$request->category_id;
        $save->sub_category_id          =$request->sosub_category_idrt;
        $save->chind_category_id        =$request->chind_category_id;
        $save->also                     =$request->also;
        $save->store                    =$request->store;
        $save->description              =$request->description;
        $save->date                     =$request->date;
        $save->tag                      =$request->tag;
        $save->model                    =$request->model;
        $save->hsn                      =$request->hsn;
        $save->sku                      =$request->sku;
        $save->price                    =$request->price;
        $save->offer_price              =$request->offer_price;
        $save->text_applied             =$request->text_applied;
        $save->status                   =(int)$request->status??'0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'category');

            if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'category');

            if ($save->save())
            return response(['status' => true, 'msg' => 'Category Added Successfully.']);
        return response(['status' => false, 'msg' => 'Category not Added.']);
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
