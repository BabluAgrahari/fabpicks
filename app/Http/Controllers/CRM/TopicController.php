<?php

namespace App\Http\Controllers\CRM;

use App\Exports\TopicExport;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TopicController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isAdmin')->except(['index']);
    }

    public function index(Request $request)
    {
        try {

            $query = Topic::userAccess();

            if (!empty($request->name))
                $query->where('name', 'LIKE', "%$request->name%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            unset($request['perPage']);
            unset($request['page']);
            $data['filter'] = $request->all();
            return view('crm.topic.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {

            $save = new Topic();
            $save->name             = $request->name;
            $save->description      = $request->description;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? 0;

            //for logo upload
            if (!empty($request->file('logo')))
                $save->logo  = singleFile($request->file('logo'), 'Topic');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Topic Added Successfully.']);

            return response(['status' => false, 'msg' => 'Topic not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Topic::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $save = Topic::find($id);
            $save->name             = $request->name;
            $save->description      = $request->description;
            $save->sort             = (int)$request->sort;
            $save->status           = (int)$request->status ?? 0;

            //for logo upload
            if (!empty($request->file('logo')))
                $save->logo  = singleFile($request->file('logo'), 'topic');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Topic Updated Successfully.']);

            return response(['status' => false, 'msg' => 'Topic not Updated.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $res = Topic::destroy($id);
            if ($res)
                return response(['status' => true, 'msg' => 'Topic Removed Successfully.']);

            return response(['status' => false, 'msg' => 'Topic not Removed.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function status(Request $request)

    {

        try {

            $save = Topic::find($request->id);
            // pr($request->all());die;
            $save->status = (int)$request->status;

            $save->save();

            if ($save->status == 1)

                return response(['status' => 'success', 'msg' => 'This Topic is Active!', 'val' => $save->status]);

            return response(['status' => 'success', 'msg' => 'This Topic is Inactive!', 'val' => $save->status]);
        } catch (Exception $e) {

            return response(['status' => 'error', 'msg' => 'Something went wrong!!']);
        }
    }

    // public function export(Request $request)
    // {

    //     return Excel::download(new TopicExport($request), 'Topic.xlsx');
    // }
}
