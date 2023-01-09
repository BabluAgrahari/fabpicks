<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survay extends BaseModel
{
    use HasFactory;

    public function Questions()
    {

        return $this->hasMany(SurvayQuestion::class, 'survay_id', '_id');
    }
}
