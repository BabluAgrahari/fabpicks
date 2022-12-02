<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;

use Exception;

class ClientController extends Controller
{
    public function index()
    {
        try{
            $record =Client::where('store',1)->get();

            if($record->isEmpty())
                return $this->notFoundRes();
            return $this->successRes($record);

        }catch(Exception $e){
            return $this->failRes($e->getMessage());
        }

    }

    public function show($id)
    {
        try{
            $record = Client::find($id);
            return $this->successRes($record);

        }catch(Exception $e){
            return $this->failRes($e->getMessage());
        }
    }
}
