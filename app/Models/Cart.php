<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends BaseModel
{
    use HasFactory;

    public function Product(){

        return $this->hasOne(Product::class,'_id','product_id');
    }
}
