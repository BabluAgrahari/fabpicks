<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    use HasFactory;

    public function User(){

        return $this->hasOne(User::class,'_id','user_id')->select('_id','name','profile_img');
    }

    
}
