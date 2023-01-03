<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Console\View\Components\Alert;

class CouponController extends Controller
{
   
    public function index(Request $request)
    {
        $query = Coupon::userAccess();

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->latest()->paginate($perPage);

        unset($request['perPage']);
        unset($request['page']);
        $data['filter'] = $request->all();
        return view('crm.coupon.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->from_amount > $request->to_amount)
            return response(['validation' => ['to_amount' => 'To Amount should not smaller than From Amount.']]);

        $coupon = Coupon::latest()->userAccess()->limit(1)->first();

        if (!empty($coupon) && $coupon->to_amount >= $request->from_amount)
            return response(['status' => false, 'msg' => 'Invalide Discount Range.']);

        $save = new Coupon();
        $save->from_amount      = $request->from_amount;
        $save->to_amount        = $request->to_amount;
        $save->discount         = $request->discount;
        if ($save->save())
            return response(['status' => true, 'msg' => 'Coupon Added Successfully.']);

        return response(['status' => false, 'msg' => 'Coupon not Added.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $record = Coupon::find($id);
        return response(['status' => true, 'record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $save = Coupon::find($id);
        $save->from_amount          = $request->from_amount;
        $save->to_amount          = $request->to_amount;
        $save->discount          = $request->discount;
        if ($save->save())
            return response(['status' => true, 'msg' => 'Coupon Updated Successfully.']);

        return response(['status' => false, 'msg' => 'Coupon not Updated.']);
    }

    public function destroy($id)
    {
        //
    }
}
