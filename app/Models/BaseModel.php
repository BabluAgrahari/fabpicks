<?php

namespace App\Models;

use App\Observers\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as EloquentModel;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class BaseModel extends EloquentModel
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    const DELETED_AT = 'deleted';


    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        self::observe(Timestamp::class);
    }
}
