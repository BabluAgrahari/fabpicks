<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Request\OrderRequest;

use Exception;

class OrderController extends Controller
{

    public function index()
    {
        try {
            $record = Order::get();

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
            $record = Order::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function store(OrderRequest $request)
    {
        try {
            $save = new Order();
            $save->order_number          = rand(100000, 999999);
            $save->order_date            = (int)strtotime($request->order_date);
            $save->amount                = $request->amount;
            $save->tax_amount            = $request->tax_amount;
            $save->status                = $request->status;
            $save->shipping_details      = $request->shipping_details;
            $save->billing_details       = $request->billing_details;
            $save->products              = $request->products;

            if ($save->save())
                return $this->successRes('Order Created Successfully.');

            return $this->failRes('Order not Created.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $save = Order::find($id);
            $save->status    = $request->status;

            if ($save->save())
                return $this->successRes('Order updated Successfully.');

            return $this->failRes('Order not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
