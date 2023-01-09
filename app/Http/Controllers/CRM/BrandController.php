<?php

namespace App\Http\Controllers\CRM;

use App\Exports\BrandExport;
use App\Http\Controllers\Controller;
use App\Http\Request\BrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isAdmin')->except(['index']);
    }

    public function index(Request $request)
    {
        try {

            $query = Brand::userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            unset($request['perPage']);
            unset($request['page']);
            $data['filter'] = $request->all();
            return view('crm.brand.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(BrandRequest $request)
    {
        try {

            $save = new Brand();
            $save->name             = $request->name;
            $save->description      = $request->description;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? 0;

            //for logo upload
            if (!empty($request->file('logo')))
                $save->logo  = singleFile($request->file('logo'), 'brand');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Brand Added Successfully.']);

            return response(['status' => false, 'msg' => 'Brand not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Brand::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(BrandRequest $request, $id)
    {
        try {
            $save = Brand::find($id);
            $save->name             = $request->name;
            $save->description      = $request->description;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? 0;

            //for logo upload
            if (!empty($request->file('logo')))
                $save->logo  = singleFile($request->file('logo'), 'brand');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Brand Updated Successfully.']);

            return response(['status' => false, 'msg' => 'Brand not Updated.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $res = Brand::destroy($id);
            if ($res)
                return response(['status' => true, 'msg' => 'Brand Removed Successfully.']);

            return response(['status' => false, 'msg' => 'Brand not Removed.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function status(Request $request)

    {

        try {

            $save = Brand::find($request->id);
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

    public function export(Request $request)
    {

        return Excel::download(new BrandExport($request), 'brand.xlsx');
    }
}
