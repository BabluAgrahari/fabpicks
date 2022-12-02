<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubAttribute;
use Exception;

class SubAttributeController extends Controller
{
    public function index()
    {
        try {
            $record = SubAttribute::with(['Attribute'])->where('status', 1)->get();

            if ($record->isEmpty())
                return $this->notFoundRes();

            return $this->successRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function show($id)
    {
        try{

            $record = SubAttribute::with(['Attribute'])->find($id);
            return $this->successRes($record);

        } catch(Exception $e){
            return $this->failRes($e->getMessage());
        }
    }
}
