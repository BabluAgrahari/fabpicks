<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Exception;

class ProductController extends Controller
{
    public function index( Request $request)
    {
        try{
            $record =Product::with(['Inventory.Attributes','Inventory.SubAttributes','SubCategory.Category','Brand'])->get();

            if (!empty($request->name))
                $record->where('name', 'LIKE', "%$request->name%");
               
            if($record->isEmpty())
                return $this->notFoundRes();
            return $this->recordsRes($record);

        }catch(Exception $e){
            return $this->failRes($e->getMessage());
        }

    }

    public function show($id)
    {
        try{
            $record = Product::with(['Inventory.Attributes','Inventory.SubAttributes'])->find($id);
            return $this->recordRes($record);

        }catch(Exception $e){
            return $this->failRes($e->getMessage());
        }
    }
}
