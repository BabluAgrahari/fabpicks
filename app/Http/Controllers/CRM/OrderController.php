<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexOrder()
    {

        $data['lists'] = Order::get();
        return view('crm/order/list',$data);
        try {
            return view('crm/order/list');
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }
}
