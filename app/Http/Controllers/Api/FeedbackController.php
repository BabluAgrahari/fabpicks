<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;


use Exception;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $save = new Feedback();
        $save->user_id          = Auth::user()->_id;
        $save->review           = $request->review;
        $save->quality          = $request->quality;
        $save->price            = $request->price;
        $save->value            = $request->value;
        $save->remarks          = $request->remarks;
        $save->status            = $request->status;

        if ($save->save())
            return $this->successRes('Feedback Created Successfully.');

        return $this->failRes('Feedback not Created.');
    }

 
}
