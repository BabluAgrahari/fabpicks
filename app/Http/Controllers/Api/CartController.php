<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;

class CartController extends Controller
{
    public function index()
    {
        try {

            $data = Category::where('status', 1)->get();

            if ($data->isEmpty())
                return $this->notFoundRes();

            return $this->successRes($data);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $record = Category::find($id);
            return $this->successRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
