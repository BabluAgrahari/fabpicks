<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexOrder()
    {
        try {
            return view('crm/order/list');
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }
}
