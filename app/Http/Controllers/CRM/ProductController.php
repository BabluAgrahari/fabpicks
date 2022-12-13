<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\SubAttribute;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Survay;
use App\Http\Request\ProductRequest;
use App\Models\Category;
use App\Models\ProductInventory;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        try {

            $query = Product::with(['SubCategory.Category'])->userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();

            return view('crm.product.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function create()
    {
        try {

            $data['brands'] = Brand::where('status', 1)->get();
            $data['survay'] = Survay::where('status', 1)->get();
            $data['subCategories'] = SubCategory::with(['Category'])->where('status', 1)->get();
            $data['attributes'] = Attribute::where('status', 1)->get();

            return view('crm.product.create', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $save = new Product();
            $save->name                     = $request->name;
            $save->description              = $request->description;
            $save->size                     = (int)$request->size;
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

            if (!empty($request->file('thumbnail')))
                $save->image  = singleFile($request->file('thumbnail'), 'product');

            if (!$save->save())
                return response(['status' => false, 'msg' => 'Product Not Added.']);


            //for store inventory product inventory collection
            $this->inventory($request->inventory, $save->_id);
            return response(['status' => true, 'msg' => 'Product Added Successfully.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }


    public function subAttribute($id)
    {
        try {
            $data = SubAttribute::where('attribute_id', $id)->get();
            return response(['status' => true, 'record' => $data]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data['brands'] = Brand::where('status', 1)->get();
            $data['survay'] = Survay::where('status', 1)->get();
            $data['subCategories'] = SubCategory::with(['Category'])->where('status', 1)->get();
            $data['attributes'] = Attribute::where('status', 1)->get();
            $data['res'] = Product::find($id);
            return view('crm.product.edit', $data);
        } catch (Exception $e) {
            return response('500')->with(['error', $e->getMessage()]);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $save = Product::find($id);
            $save->name                     = $request->name;
            $save->description              = $request->description;
            $save->size                     = (int)$request->size;
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

            if (!empty($request->file('thumbnail')))
                $save->image  = singleFile($request->file('thumbnail'), 'product');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Product Updared Successfully.']);

            return response(['status' => false, 'msg' => 'Product Not .']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
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

    public function viewProduct(Request $request, $id)
    {
        try {
            $record = Product::where([['sub_category',$id],['_id', "!=", $request->product_id]])->get();
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }


    public function sortupdate(ProductRequest $request, $id)
    {
        // pr($request->all());
        try {
            $save = Product::find($id);
            $save->sort        = $request->sort;
    
            if ($save->save())
            return response(['status' => true, 'msg' => 'Sort Updared Successfully.']);

        return response(['status' => false, 'msg' => 'Sort Not Update.']);
         
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

}
