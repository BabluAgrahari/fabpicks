<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survay;
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
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'answer' => 'required',
                'question_id' => 'required'
            ]);

            if ($validator->fails())
                return $this->validationRes($validator->messages());

            $save = SurvayQuestion::find($request->question_id);
            $answer = [];
            if (!empty($save->answer))
                $answer = $save->answer;

            $answer[] = ['user_id' => $request->user_id, 'answer' => $request->answer];
            $save->answer = $answer;

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
}
