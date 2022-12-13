<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Request\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Exception;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        try {

            $query = Attribute::userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");


            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();

            return view('crm.attribute.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(AttributeRequest $request)
    {
        try {
            $save = new Attribute();
            $save->name             = $request->name;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? '0';

            if (!empty($request->file('banner')))
                $save->banner  = singleFile($request->file('banner'), 'attribute');

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'attribute');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Attribute Added Successfully.']);

            return response(['status' => false, 'msg' => 'Attribute not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {   
        try{
        $record = Attribute::find($id);
        return response(['status' => true, 'record' => $record]);
        }catch(Exception $e){
            return response(['status'=>false,'msg'=> $e->getMessage()]);
        }
    }

    public function update(AttributeRequest $request, $id)
    {
        try{
        $save = Attribute::find($id);
        $save->name             = $request->name;
        $save->sort             = (int)$request->sort;
        $save->status           = (int)$request->status ?? '0';

        if (!empty($request->file('banner')))
            $save->banner  = singleFile($request->file('banner'), 'attribute');

        if (!empty($request->file('icon')))
            $save->icon  = singleFile($request->file('icon'), 'attribute');

        if ($save->save())
            return response(['status' => true, 'msg' => 'Attribute Update Successfully.']);

        return response(['status' => false, 'msg' => 'Attribute not Update.']);
        }catch(Exception $e){
            return response(['status'=>false ,'msg'=> $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }
}
