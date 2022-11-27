<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurvayFeedbackController extends Controller
{
    public function sfeedback()
    {
        return view('crm.survayFeedback.list');
    }
}
