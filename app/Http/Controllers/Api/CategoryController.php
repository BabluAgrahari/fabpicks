<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        try {

            $data = Category::with(['SubCategory'])->where('status', 1)->get();

            if ($data->isEmpty())
                return $this->notFoundRes();

            return $this->recordsRes($data);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $record = Category::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
