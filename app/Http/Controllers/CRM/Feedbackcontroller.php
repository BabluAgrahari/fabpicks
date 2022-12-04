<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback()
    {

        $data['lists'] = Feedback::with('User')->get();
        return view('crm/feedback/list',$data);
    }
}