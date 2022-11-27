<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Survay;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('crm.product.list');
    }

    public function create(){

        $data['brands'] = Brand::where('status',1)->get();
        $data['survay'] = Survay::where('status',1)->get();
        $data['subCategories'] = SubCategory::with(['Category'])->where('status',1)->get();
        $data['attributes'] = Attribute::where('status',1)->get();
        // pr($data['subCategories']);die;
        return view('crm.product.create',$data);
    }
}
