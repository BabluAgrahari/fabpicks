<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survay;
use Illuminate\Support\Facades\Auth;
use Exception;

class SurvayController extends Controller
{
    public function index()
    {
        try {

            $record = Survay::latest()->get();

            if ($record->isEmpty())
                return $this->notFoundRes();

            return $this->recordsRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


   

}
