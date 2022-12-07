<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Request\CartRequest;
use App\Models\Cart;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        try {
            $data = Cart::with('Product')->latest()->get();

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
            $record = Cart::with('Product')->find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function store(CartRequest $request)
    {
        try {
            $save = new Cart();
            $save->product_id = $request->product_id;
            $save->qty = (int)$request->qty;
            $save->code = $request->code;
            if ($save->save())
                return $this->successRes('Product added in cart.');

            return $this->failRes('Product not added.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function update(CartRequest $request, $id)
    {
        try {
            $save = Cart::find($id);
            $save->qty = (int)$request->qty;
            if ($save->save())
                return $this->successRes('Quantity updated.');

            return $this->failRes('Quantity not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $res = Cart::find($id)->delete();
            if ($res)
                return $this->successRes('Item Removed.');

            return $this->failRes('Item not Removed.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
