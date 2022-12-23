<?php

namespace App\Http\Controllers\CRM;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Request\CategoryRequest;
use SebastianBergmann\Exporter\Exporter;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller 
{
    public function index(Request $request)
    {
        try {

            
            $query = Category::userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");

                if (!empty($request->description))
                $query->where('description', 'LIKE', "%$request->description%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();

            return view('crm.category.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $save = new Category();
            $save->name    = $request->name;
            $save->description      = $request->description;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? '0';

            if (!empty($request->file('banner')))
                $save->banner  = singleFile($request->file('banner'), 'category');

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'category');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Category Added Successfully.']);
            return response(['status' => false, 'msg' => 'Category not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Category::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $save = Category::find($id);
            $save->name             = $request->name;
            $save->description      = $request->description;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? '0';

            if (!empty($request->file('banner')))
                $save->banner  = singleFile($request->file('banner'), 'category');

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'category');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Category Update Successfully.']);

            return response(['status' => false, 'msg' => 'Category not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $res = Category::destroy($id);
            if ($res)
                return response(['status' => true, 'msg' => 'Category Removed Successfully.']);

            return response(['status' => false, 'msg' => 'Category not Removed.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function status(Request $request)

    {

        try {

            $save = Category::find($request->id);
// pr($request->all());die;
            $save->status = (int)$request->status;

            $save->save();

            if ($save->status == 1)

                return response(['status' => 'success', 'msg' => 'This Status is Active!', 'val' => $save->status]);

            return response(['status' => 'success', 'msg' => 'This Status is Inactive!', 'val' => $save->status]);
        } catch (Exception $e) {

            return response(['status' => 'error', 'msg' => 'Something went wrong!!']);
        }

    }

    public function export(Request $request)
    {
        
         return Excel::download(new CategoryExport($request), 'categort.xlsx');
    }
}
