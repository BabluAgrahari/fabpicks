<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping_billing;

use Exception;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $save = new Shipping_billing();

            if($request->same_billing == 0){

            $save->shipping_name        = $request->shipping_name;
            $save->shipping_email       = $request->shipping_email;
            $save->shipping_phone       = $request->shipping_phone;
            $save->shipping_city        = $request->shipping_city;
            $save->shipping_state       = $request->shipping_state;
            $save->shipping_address     = $request->shipping_address;
            $save->shipping_pincode     = $request->shipping_pincode;
            $save->billing_name         = $request->billing_name;
            $save->billing_email        = $request->billing_email;
            $save->billing_phone        = $request->billing_phone;
            $save->billing_city         = $request->billing_city;
            $save->billing_state        = $request->billing_state;
            $save->billing_address      = $request->billing_address;
            $save->billing_pincode      = $request->billing_pincode;
            }else
            {
            $save->shipping_name        = $request->shipping_name;
            $save->shipping_email       = $request->shipping_email;
            $save->shipping_phone       = $request->shipping_phone;
            $save->shipping_city        = $request->shipping_city;
            $save->shipping_state       = $request->shipping_state;
            $save->shipping_address     = $request->shipping_address;
            $save->shipping_pincode     = $request->shipping_pincode;
            }

            if ($save->save())
                return $this->successRes('Shipping And Billing Created Successfully.');

            return $this->failRes('Shipping And Billing not Created.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

   
}
