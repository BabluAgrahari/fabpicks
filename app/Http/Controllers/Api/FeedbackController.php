<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Http\Request\FeedbackRequest;
use Illuminate\Support\Facades\Auth;
use Exception;

class FeedbackController extends Controller
{
    public function index()
    {
        try {

            $record = Feedback::where('status','success')->latest()->get();

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
            $record = Feedback::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function store(FeedbackRequest $request)
    {
        $save = new Feedback();
        $save->review     = $request->review;
        $save->quality    = $request->quality;
        $save->price      = $request->price;
        $save->value      = $request->value;
        $save->remarks    = $request->remarks;
        $save->status     = $request->status;

        if ($save->save())
            return $this->successRes('Feedback Created Successfully.');

        return $this->failRes('Feedback not Created.');
    }
}
