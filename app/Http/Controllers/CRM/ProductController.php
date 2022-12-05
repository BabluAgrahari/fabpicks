<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\SubAttribute;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Survay;
use App\Http\Request\ProductRequest;
use App\Models\ProductInventory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['lists'] = Product::with(['SubCategory.Category'])->get();

        return view('crm.product.list', $data);
    }

    public function create()
    {

        $data['brands'] = Brand::where('status', 1)->get();
        $data['survay'] = Survay::where('status', 1)->get();
        $data['subCategories'] = SubCategory::with(['Category'])->where('status', 1)->get();
        $data['attributes'] = Attribute::where('status', 1)->get();

        return view('crm.product.create', $data);
    }

    public function store(ProductRequest $request)
    {
        $save = new Product();
        $save->name                     = $request->name;
        $save->description              = $request->description;
        $save->tags                     = $request->tags;
        $save->product_type             = $request->product_type;
        $save->trial_point              = (int)$request->trial_point;
        $save->sale_price               = (int)$request->sale_price;
        $save->rewards_point            = (int)$request->rewards_point;
        $save->sub_category             = $request->sub_category;
        $save->brand_id                 = $request->brand_id;
        $save->no_feedback              = $request->no_feedback;
        $save->pre_qulifing_question    = $request->pre_qulifing_question;
        $save->mrp                      = (int)$request->mrp;
        $save->offer_price              = (int)$request->offer_price;
        $save->maximum_qty              = (int)$request->maximum_qty;
        $save->expire_date              = (int)strtotime($request->expire_date);
        $save->details                  = $request->details;

        if (!empty($request->file('thumbnail')))
            $save->thumbnail  = singleFile($request->file('thumbnail'), 'product');

        if (!$save->save())
            return response(['status' => false, 'msg' => 'Product Not Added.']);


        //for store inventory product inventory collection
        $this->inventory($request->inventory, $save->_id);
        return response(['status' => true, 'msg' => 'Product Added Successfully.']);
    }


    public function subAttribute($id)
    {
        $data = SubAttribute::where('attribute_id', $id)->get();
        return response(['status' => true, 'record' => $data]);
    }

    public function edit($id)
    {
        $data['brands'] = Brand::where('status', 1)->get();
        $data['survay'] = Survay::where('status', 1)->get();
        $data['subCategories'] = SubCategory::with(['Category'])->where('status', 1)->get();
        $data['attributes'] = Attribute::where('status', 1)->get();
        $data['res'] = Product::with('Inventory')->find($id);
        return view('crm.product.edit', $data);
    }

    public function update(ProductRequest $request, $id)
    {
        // pr($request->all());
        $save = Product::find($id);
        $save->name                     = $request->name;
        $save->description              = $request->description;
        $save->tags                     = $request->tags;
        $save->product_type             = $request->product_type;
        $save->trial_point              = (int)$request->trial_point;
        $save->sale_price               = (int)$request->sale_price;
        $save->rewards_point            = (int)$request->rewards_point;
        $save->sub_category             = $request->sub_category;
        $save->brand_id                 = $request->brand_id;
        $save->no_feedback              = $request->no_feedback;
        $save->pre_qulifing_question    = $request->pre_qulifing_question;
        $save->mrp                      = (int)$request->mrp;
        $save->offer_price              = (int)$request->offer_price;
        $save->maximum_qty              = (int)$request->maximum_qty;
        $save->expire_date              = (int)strtotime($request->expire_date);
        $save->details                  = $request->details;

        if (!empty($request->file('thumbnail')))
            $save->thumbnail  = singleFile($request->file('thumbnail'), 'product');

        if (!$save->save())
            return response(['status' => false, 'msg' => 'Product Not .']);

        //for store inventory product inventory collection
        $this->inventory($request->inventory, $save->_id);
        return response(['status' => true, 'msg' => 'Product Updared Successfully.']);
    }


    private function inventory($inventory = array(), $product_id = false)
    {

        if (empty($inventory) || !$product_id)
            return false;

        ProductInventory::where('product_id', $product_id)->delete();

        foreach ($inventory as $inv) {

            $inv = (object)$inv;
            $save = new ProductInventory();
            $save->product_id = $product_id;
            $save->stock = (int)$inv->stock;
            $save->unit = $inv->unit;
            $save->attribute = $inv->attribute;
            $save->sub_attribute = $inv->sub_attribute;
            $save->save();
        }
    }
}