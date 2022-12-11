<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    public function SubCategory(){

        return $this->hasOne(SubCategory::class,'_id','sub_category');
    }


    public function Inventory(){

        return $this->hasMany(ProductInventory::class,'product_id','_id');
    }

   
}
