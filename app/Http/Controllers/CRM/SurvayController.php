<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Http\Request\SurvayRequest;
use App\Models\Survay;
use App\Models\SurvayQuestion;
use Exception;
use Illuminate\Http\Request;

class SurvayController extends Controller
{
    public function index(Request $request)
    {
        try {

            $query = Survay::userAccess();

            if (!empty($request->title))
                $query->where('title', 'LIKE', "%$request->title%");

            if (!empty($request->description))
                $query->where('description', 'LIKE', "%$request->description%");

            if (!empty($request->type))
                $query->where('type', 'LIKE', "%$request->type%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();
            return view('crm.survay.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $save = new Survay();
            $save->title  = $request->title;
            $save->type  = $request->type;
            $save->description  = $request->description;

            if ($save->save())
                return response(['status' => true, 'msg' => 'Survay Added Successfully.']);

            return response(['status' => false, 'msg' => 'Survay not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = Survay::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $save = Survay::find($id);
            $save->title  = $request->title;
            $save->type  = $request->type;
            $save->description  = $request->description;

            if ($save->save())
                return response(['status' => true, 'msg' => 'Survay Update Successfully.']);

            return response(['status' => false, 'msg' => 'Survay not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function survayQuestion(Request $request)
    {
        try {

            $save = new SurvayQuestion();
            $save->survay_id = $request->survay_id;
            $save->survay_type = $request->survay_type;
            $save->survay_question = $request->survay_question;
            $data = $request->data;

            if (!empty($request->file('image')))
                $data['image']  = singleFile($request->file('image'), 'survay');

            $save->data = $data;
            $save->reward = (int)$request->reward;
            $save->required = (int)$request->required ?? 0;

            if (!$save->save())
                return response(['status' => false, 'msg' => 'Survay not Added.']);

            $data['list'] = $save;
            $respose = view('crm.survay.preview', $data)->render();

            return response(['status' => true, 'response' => $respose, 'msg' => 'Survay Added Successfully.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }

    public function survayQuestionView($id)
    {
        try {
            $record = SurvayQuestion::where('survay_id', $id)->get();

            return response(['status' => 'success', 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getmessage()]);
        }
    }


    public function editQuestion($id)
    {
        $data['list'] = SurvayQuestion::find($id);
        $respose = view('crm.survay.editQuestion', $data)->render();

        return response(['status' => true, 'response' => $respose]);
    }
}
