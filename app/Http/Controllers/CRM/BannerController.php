<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $data['lists'] = Banner::all();
        $data['res'] = Banner::first();
        return view('crm.banner.list',$data);
    }

    public function edit($id)
    {
        try {
            $record = Banner::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }
    
    public function update(Request $request, $id)
    {
     
        $update = Banner::find($id);
        $update->name            = $request->name;
        $update->url             = $request->url;

        if (!empty($request->file('banner')))
            $update->banner  = singleFile($request->file('banner'), 'banner');

            if ($update->save())
            return response(['status' => true, 'msg' => 'Banner Updated Successfully.']);

        return response(['status' => false, 'msg' => 'Banner not Updated.']);
  
    }
    
}
