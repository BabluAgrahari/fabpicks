<?php

namespace App\Observers;

class Timestamp
{
    public function saving($model)
    {
        if (empty($model->_id))
            $model->created = time();

        $model->updated = time();
    }
}
