<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Request\SubCategoryRequest;
use App\Models\Category;
use Exception;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = SubCategory::userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");

                if (!empty($request->discription))
                $query->where('discription', 'LIKE', "%$request->discription%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();
            $data['categories'] = Category::where('status', 1)->get();
            return view('crm.sub_category.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(SubCategoryRequest $request)
    {
        try {
            $save = new SubCategory();
            $save->category_id          = $request->category_id;
            $save->name                 = $request->name;
            $save->discription          = $request->discription;
            $save->sort                 = $request->sort;
            $save->status               = (int)$request->status ?? '0';

            if (!empty($request->file('banner')))
                $save->banner  = singleFile($request->file('banner'), 'SubCategory');

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'SubCategory');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Sub Category Added Successfully.']);

            return response(['status' => false, 'msg' => 'Sub Category not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = SubCategory::find($id);

            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function update(SubCategoryRequest $request, $id)
    {
        try {
            $save = SubCategory::find($id);
            $save->category_id          = $request->category_id;
            $save->name                 = $request->name;
            $save->discription          = $request->discription;
            $save->sort                 = $request->sort;
            $save->status               = (int)$request->status ?? '0';

            if (!empty($request->file('banner')))
                $save->banner  = singleFile($request->file('banner'), 'SubCategory');

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'SubCategory');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Sub Category Update Successfully.']);

            return response(['status' => false, 'msg' => 'Sub Category not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $res = SubCategory::destroy($id);
            if ($res)
                return response(['status' => true, 'msg' => 'Sub Category Removed Successfully.']);

            return response(['status' => false, 'msg' => 'Sub Category not Removed.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }
}
