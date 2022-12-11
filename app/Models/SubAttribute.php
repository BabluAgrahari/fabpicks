<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAttribute extends BaseModel
{
    use HasFactory;
    public function Attribute(){

        return $this->hasOne(Attribute::class,'_id','attribute_id')->select('_id','name');
    }
}
