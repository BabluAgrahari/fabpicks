<?php

namespace App\Http\Controllers;

use App\Traits\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,Response;

    public $prePage = NULL;
    public function __construct()
    {
        $this->prePage =config('global.perPage');
    }
}
