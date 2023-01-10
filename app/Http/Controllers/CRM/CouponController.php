<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Exception;
use Illuminate\Console\View\Components\Alert;

class CouponController extends Controller
{

    public function index(Request $request)
    {
        try {
            $query = Coupon::userAccess();

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->latest()->paginate($perPage);

            unset($request['perPage']);
            unset($request['page']);
            $data['filter'] = $request->all();
            return view('crm.coupon.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {

            if (strtotime($request->expiry) < strtotime(date('Y-m-d H:i')))
                return response(['validation' => ['expiry' => 'Please Select valid Expiry Date.']]);

            // $coupon = Coupon::latest()->userAccess()->limit(1)->first();

            // if (!empty($coupon) && $coupon->to_amount >= $request->from_amount)
            //     return response(['status' => false, 'msg' => 'Invalide Discount Range.']);

            $save = new Coupon();
            $save->coupon_code      = $request->coupon_code;
            $save->coupon_qty       = (int)$request->coupon_qty;
            $save->expiry           = (int)strtotime($request->expiry);
            $save->amount           = $request->amount;
            $save->status           = (int)$request->status;
            $save->expiry_status    = 1;
            $save->discount_type    = $request->discount_type;
            $save->cart_value       = $request->cart_value;
            $save->description      = $request->description;
            $save->link             = $request->link;

            if (!empty($request->file('image')))
            $save->image  = singleFile($request->file('image'), 'coupon');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Coupon Added Successfully.']);

            return response(['status' => false, 'msg' => 'Coupon not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $record = Coupon::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $save = Coupon::find($id);
            $save->coupon_code      = $request->coupon_code;
            $save->coupon_qty       = (int)$request->coupon_qty;
            $save->expiry           = (int)strtotime($request->expiry);
            $save->amount           = $request->amount;
            $save->status           = (int)$request->status;
            $save->discount_type    = $request->discount_type;
            $save->cart_value       = $request->cart_value;
            $save->description      = $request->description;
            if ($save->save())
                return response(['status' => true, 'msg' => 'Coupon Updated Successfully.']);

            return response(['status' => false, 'msg' => 'Coupon not Updated.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }

    public function status(Request $request)

    {

        try {

            $save = Coupon::find($request->id);
            // pr($request->all());die;
            $save->status = (int)$request->status;

            $save->save();

            if ($save->status == 1)

                return response(['status' => 'success', 'msg' => 'This Brand is Active!', 'val' => $save->status]);

            return response(['status' => 'success', 'msg' => 'This Brand is Inactive!', 'val' => $save->status]);
        } catch (Exception $e) {

            return response(['status' => 'error', 'msg' => 'Something went wrong!!']);
        }
    }
}
