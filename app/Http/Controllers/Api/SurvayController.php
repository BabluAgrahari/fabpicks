<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survay;
use App\Models\SurvayAnswer;
use App\Models\SurvayQuestion;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Validator;

class SurvayController extends Controller
{
    public function index()
    {
        try {

            $record = Survay::with(['Questions'])->latest()->get();

            if ($record->isEmpty())
                return $this->notFoundRes();

            return $this->recordsRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $record = Survay::with(['Questions'])->find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function storeAnswer(Request $request)
    {
        try {

            $question_type = ($request->question_type == 'multi_choise') ? 'array' : '';
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'answer' => 'required|' . $question_type,
                'question_id' => 'required',
                'question_type' => 'required|string|in:single_choise,multi_choise,yes_no,rating,upload_image,subjective_question'
            ]);

            if ($validator->fails())
                return $this->validationRes($validator->messages());

            $save = SurvayQuestion::find($request->question_id);

            if ($save->survay_type != $request->question_type)
                return $this->failRes('Question type is invalid.');

            // $answer = [];
            // if (!empty($save->answer))
            //     $answer = $save->answer;

            // $answer[] = ['user_id' => $request->user_id, 'answer' => $request->answer];
            // $save->answer = $answer;

            //surevay answer into survay answer collection
            $ans = new SurvayAnswer();
            $ans->survay_id   = $save->survay_id;
            $ans->user_id     = $request->user_id ?? Auth::user()->_id;
            $ans->question_id = $request->question_id;
            $ans->answer      = $request->answer;
            $ans->question_type = $request->question_type;
            $ans->save();

            if ($save->save())
                return $this->successRes('Answer Saved Successfully.');

            return $this->failRes('Answer not Saved.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function topics()
    {
        try {

            $record = Topic::latest()->wher('status', 1)->get();

            if ($record->isEmpty())
                return $this->notFoundRes();

            return $this->recordsRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function survayReport(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'survay_id' => 'required'
            ]);

            if ($validator->fails())
                return $this->validationRes($validator->messages());

            $records = SurvayAnswer::with(['Question', 'Survay'])->where('survay_id', $request->survay_id)->where('user_id', Auth::user()->_id)->get();

            return $this->recordsRes($records);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
