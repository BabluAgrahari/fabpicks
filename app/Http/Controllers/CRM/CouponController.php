<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Console\View\Components\Alert; 

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Coupon::userAccess();

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
        return view('crm.coupon.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Coupon::find($id);
        return response(['status' => true, 'record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
