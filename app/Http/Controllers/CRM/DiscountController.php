<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Illuminate\Console\View\Components\Alert;

class DiscountController extends Controller
{
   
    public function index(Request $request)
    {
        $query = Discount::userAccess();

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->latest()->paginate($perPage);

        unset($request['perPage']);
        unset($request['page']);
        $data['filter'] = $request->all();
        return view('crm.discount.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->from_amount > $request->to_amount)
            return response(['validation' => ['to_amount' => 'To Amount should not smaller than From Amount.']]);

        $discount = Discount::latest()->userAccess()->limit(1)->first();

        if (!empty($discount) && $discount->to_amount >= $request->from_amount)
            return response(['status' => false, 'msg' => 'Invalide Discount Range.']);

        $save = new Discount();
        $save->from_amount      = $request->from_amount;
        $save->to_amount        = $request->to_amount;
        $save->discount         = $request->discount;
        if ($save->save())
            return response(['status' => true, 'msg' => 'Discount Added Successfully.']);

        return response(['status' => false, 'msg' => 'Discount not Added.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $record = Discount::find($id);
        return response(['status' => true, 'record' => $record]);
    }

    public function update(Request $request, $id)
    {
        $save = Discount::find($id);
        $save->from_amount          = $request->from_amount;
        $save->to_amount          = $request->to_amount;
        $save->discount          = $request->discount;
        if ($save->save())
            return response(['status' => true, 'msg' => 'Discount Updated Successfully.']);

        return response(['status' => false, 'msg' => 'Discount not Updated.']);
    }

    public function destroy($id)
    {
        //
    }
}
