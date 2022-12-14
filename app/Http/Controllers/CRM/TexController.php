<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Tex;
use Exception;
use Illuminate\Http\Request;

class TexController extends Controller
{


    public function index(Request $request)
    {
        try {

            $data['lists']=Tex::all();
            return view('crm.tex.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {

            $save = new Tex();
            $save->name       = $request->name;
            $save->amount       = (int)$request->amount;

            if ($save->save())
                return response(['status' => true, 'msg' => 'Tex Added Successfully.']);

            return response(['status' => false, 'msg' => 'Tex not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Tex::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $save = Tex::find($id);
            $save->name       = $request->name;
            $save->amount       = (int)$request->amount;
            
            if ($save->save())
                return response(['status' => true, 'msg' => 'Tex Updated Successfully.']);

            return response(['status' => false, 'msg' => 'Tex not Updated.']);
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
