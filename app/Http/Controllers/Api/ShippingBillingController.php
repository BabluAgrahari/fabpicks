<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingBilling;

use Exception;

class ShippingBillingController extends Controller
{

    public function index()
    {
        try {

            $record = ShippingBilling::latest()->get();

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
            $record = ShippingBilling::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $save = new ShippingBilling();

            $save->shipping_name        = $request->shipping_name;
            $save->shipping_email       = $request->shipping_email;
            $save->shipping_phone       = $request->shipping_phone;
            $save->shipping_city        = $request->shipping_city;
            $save->shipping_state       = $request->shipping_state;
            $save->shipping_address     = $request->shipping_address;
            $save->shipping_pincode     = $request->shipping_pincode;

            if ($request->same_billing) {
                $save->billing_name         = $request->shipping_name;
                $save->billing_email        = $request->shipping_email;
                $save->billing_phone        = $request->shipping_phone;
                $save->billing_city         = $request->shipping_city;
                $save->billing_state        = $request->shipping_state;
                $save->billing_address      = $request->shipping_address;
                $save->billing_pincode      = $request->shipping_pincode;
            } else {
                $save->billing_name         = $request->billing_name;
                $save->billing_email        = $request->billing_email;
                $save->billing_phone        = $request->billing_phone;
                $save->billing_city         = $request->billing_city;
                $save->billing_state        = $request->billing_state;
                $save->billing_address      = $request->billing_address;
                $save->billing_pincode      = $request->billing_pincode;
            }
            $save->billing_same = $request->same_billing;
            if ($save->save())
                return $this->successRes('Shipping & Billing Created Successfully.');

            return $this->failRes('Shipping & Billing not Created.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
