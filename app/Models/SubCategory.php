<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends BaseModel
{
    use HasFactory;

    public function Category(){

        return $this->hasOne(Category::class,'_id','category_id')->select('_id','name');
    }
}
