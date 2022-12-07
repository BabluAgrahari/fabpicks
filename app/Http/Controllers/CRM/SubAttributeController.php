<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\SubAttribute;
use App\Models\ProductAttribute;
use App\Http\Request\SubAttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Exception;

class SubAttributeController extends Controller
{
    public function index(Request $request)
    {
        try {

            
            $query = SubAttribute::userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");


            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();

            $data['attributes'] = Attribute::where('status', 1)->get();
            return view('crm.subattribute.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function store(SubAttributeRequest $request)
    {
        try {
            $save = new SubAttribute();
            $save->attribute_id     = $request->attribute_id;
            $save->name             = $request->name;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? '0';

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'subattribute');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Sub Attribute Added Successfully.']);

            return response(['status' => false, 'msg' => 'Sub Attribute not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = SubAttribute::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(SubAttributeRequest $request, $id)
    {
        try {
            $save = SubAttribute::find($id);
            $save->attribute_id      = $request->attribute_id;
            $save->name              = $request->name;
            $save->sort              = (int)$request->sort;
            $save->status            = (int)$request->status ?? '0';

            if (!empty($request->file('banner')))
                $save->banner  = singleFile($request->file('banner'), 'subattribute');

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'subattribute');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Sub Attribute Update Successfully.']);

            return response(['status' => false, 'msg' => 'Sub Attribute not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }
}
