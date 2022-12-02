<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Exception;

class AttributeController extends Controller
{
    public function index()
    {
        try {

            $record = Attribute::where('status', 1)->get();

            if ($record->isEmpty())
                return $this->notFoundRes();

            return $this->successRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $record = Attribute::find($id);
            return $this->successRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
