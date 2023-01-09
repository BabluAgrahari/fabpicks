<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    public function SubCategory()
    {

        return $this->hasOne(SubCategory::class, '_id', 'sub_category');
    }

    public function Category()
    {
        return $this->hasOne(Category::class, '_id', 'category_id');
    }


    public function Brand()
    {

        return $this->hasOne(Brand::class, '_id', 'brand_id');
    }


    public function Inventory()
    {

        return $this->hasMany(ProductInventory::class, 'product_id', '_id');
    }

    public function PSurvey()
    {

        return $this->hasOne(Survay::class, '_id', 'pre_qulifing_question');
    }
}
