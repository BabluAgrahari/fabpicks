<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    use HasFactory;

    public function User(){

        return $this->hasOne(User::class,'_id','user_id')->select('*');
    }

    public function Product(){

        return $this->hasOne(Product::class,'_id','product_id')->select('*');
    }

    
}
