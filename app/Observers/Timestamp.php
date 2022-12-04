<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class Timestamp
{
    public function saving($model)
    {
        if (empty($model->_id)){
            $model->user_id = Auth::user()->_id ??0;
            $model->parent_id = Auth::user()->parent_id??0;
            $model->created = time();
        }

        $model->updated = time();
    }
}
