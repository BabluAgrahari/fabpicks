<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;
    public function SubCategory(){

        return $this->hasOne(SubCategory::class,'category_id','_id');
    }

}
