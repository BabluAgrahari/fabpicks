<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class Timestamp
{
    public function saving($model)
    {
        if (empty($model->_id)){
            $model->login_id = Auth::user()->_id;
            $model->parent_id = Auth::user()->parent_id;
            $model->created = time();
        }

        $model->updated = time();
    }
}
