<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class SurvayFeedbackController extends Controller
{
    public function sfeedback()
    {
        try{
        return view('crm.survayFeedback.list');
        }catch(Exception $e){
            return redirect('500')->with(['error',$e->getMessage()]);
        }
    }
}
