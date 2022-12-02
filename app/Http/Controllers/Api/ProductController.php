<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Exception;

class ProductController extends Controller
{
    public function index()
    {
        try{
            $record =Product::get();

            if($record->isEmpty())
                return $this->notFoundRes();
            return $this->successRes($record);

        }catch(Exception $e){
            return $this->failRes($e->getMessage());
        }

    }

    public function show($id)
    {
        try{
            $record = Product::find($id);
            return $this->successRes($record);

        }catch(Exception $e){
            return $this->failRes($e->getMessage());
        }
    }
}
