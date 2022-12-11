<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Request\BrandRequest;
use App\Http\Request\ShippingCostRequest;
use App\Models\Brand;
use App\Models\ShippingCost;
use Exception;
use Illuminate\Http\Request;

class ShippingCostController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('crm.shipping_cost.list');
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function getList(Request $request)
    {
        try {
            $lists = ShippingCost::userAccess()->get();
            return response(['status' => true, 'record' => $lists]);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(ShippingCostRequest $request)
    {
        try {

            $save = new ShippingCost();
            $save->origin_state       = $request->origin_state ?? 'Delhi';
            $save->destination_state  = $request->destination_state;
            $save->shipping_amount    = (int)$request->shipping_amount ?? 0;

            if ($save->save())
                return response(['status' => true, 'msg' => 'Shipping Amount Added Successfully.']);

            return response(['status' => false, 'msg' => 'Shipping Amount not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = ShippingCost::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(ShippingCostRequest $request, $id)
    {
        try {
            $save = ShippingCost::find($id);
            $save->origin_state       = $request->origin_state ?? 'Delhi';
            $save->destination_state  = $request->destination_state;
            $save->shipping_amount    = (int)$request->shipping_amount ?? 0;

            if ($save->save())
                return response(['status' => true, 'msg' => 'Shipping Amount Updated Successfully.']);

            return response(['status' => false, 'msg' => 'Shipping Amount not Updated.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }
}
