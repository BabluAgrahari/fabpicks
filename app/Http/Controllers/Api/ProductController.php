<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Exception;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {

            $query = Product::query();

            if ($request->category_id)
                $query->where('category_id', $request->category_id);

            if ($request->sub_category_id)
                $query->where('sub_category', $request->sub_category_id);

            if ($request->brand_id)
                $query->where('brand_id', $request->brand_id);

            if ($request->title)
                $query->where('title', 'LIKE', "%$request->title%");

            $record = $query->with(['Inventory.Attributes', 'Inventory.SubAttributes', 'SubCategory', 'Category', 'Brand'])->get();

            if (!empty($request->name))
                $record->where('name', 'LIKE', "%$request->name%");

            if ($record->isEmpty())
                return $this->notFoundRes();
            return $this->recordsRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $record = Product::with(['Inventory.Attributes', 'Inventory.SubAttributes', 'SubCategory', 'Category', 'Brand'])->find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
