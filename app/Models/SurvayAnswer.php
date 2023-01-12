<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurvayAnswer extends BaseModel
{
    use HasFactory;

    public function Survay()
    {
        return $this->hasOne(Survay::class, '_id', 'survay_id');
    }

    public function Question()
    {
        return $this->hasOne(SurvayQuestion::class, '_id', 'question_id');
    }
}
