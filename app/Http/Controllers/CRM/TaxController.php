<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Request\TaxRequest;
use App\Models\Tax;
use Exception;
use Illuminate\Http\Request;

class TaxController extends Controller
{


    public function index(Request $request)
    {
        try {

            $data['lists']=Tax::all();
            return view('crm.tax.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(TaxRequest $request)
    {
        try {

            $save = new Tax();
            $save->name       = $request->name;
            $save->amount       = (int)$request->amount;

            if ($save->save())
                return response(['status' => true, 'msg' => 'Tax Added Successfully.']);

            return response(['status' => false, 'msg' => 'Tax not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Tax::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(TaxRequest $request, $id)
    {
        try {
            $save = Tax::find($id);
            $save->name       = $request->name;
            $save->amount       = (int)$request->amount;
            
            if ($save->save())
                return response(['status' => true, 'msg' => 'Tax Updated Successfully.']);

            return response(['status' => false, 'msg' => 'Tax not Updated.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    // public function destroy($id)
    // {
    //     try {
    //         $res = Brand::destroy($id);
    //         if ($res)
    //             return response(['status' => true, 'msg' => 'Brand Removed Successfully.']);

    //         return response(['status' => false, 'msg' => 'Brand not Removed.']);
    //     } catch (Exception $e) {
    //         return response(['status' => false, 'msg' => $e->getMessage()]);
    //     }
    // }
}
