<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends BaseModel
{
    use HasFactory;

    public function Attributes(){

        return $this->hasOne(Attribute::class,'_id','attribute');
    }
    public function SubAttributes(){

        return $this->hasOne(SubAttribute::class,'_id','sub_attribute');
    }
}
