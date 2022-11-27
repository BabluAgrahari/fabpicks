<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Http\Request\SurvayRequest;
use App\Models\Survay;
use App\Models\SurvayQuestion;
use Illuminate\Http\Request;

class SurvayController extends Controller
{
    public function index()
    {
        $data['lists'] = Survay::all();
        return view('crm.survay.list', $data);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $save = new Survay();
        $save->title  = $request->title;
        $save->type  = $request->type;
        $save->discription  = $request->discription;

        if ($save->save())
            return response(['status' => true, 'msg' => 'Survay Added Successfully.']);

        return response(['status' => false, 'msg' => 'Survay not Added.']);
    }




    public function edit($id)
    {
        $record = Survay::find($id);
        return response(['status' => true, 'record' => $record]);
    }


    public function update(Request $request, $id)
    {
        $save = Survay::find($id);
        $save->title  = $request->title;
        $save->type  = $request->type;
        $save->discription  = $request->discription;

        if ($save->save())
            return response(['status' => true, 'msg' => 'Survay Update Successfully.']);

        return response(['status' => false, 'msg' => 'Survay not Update.']);
    }


    public function survayQuestion(Request $request)
    {
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

        if ($save->save())
            return response(['status' => true, 'msg' => 'Survay Added Successfully.']);

        return response(['status' => false, 'msg' => 'Survay not Added.']);
    }

    public function survayQuestionView($id)
    {

        $record = SurvayQuestion::where('survay_id', $id)->get();

        return response(['status' => 'success', 'record' => $record]);
    }
}
