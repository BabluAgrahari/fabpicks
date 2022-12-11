<?php

namespace App\Models;

use App\Observers\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
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

    public function scopeUserAccess($query)
    {
        $query->where([['user_id', Auth::user()->_id], ['parent_id', Auth::user()->parent_id]]);
    }

    public function scopeDateRange($query, $dateRange = '')
    {
        if (!empty($dateRange)) {
            $date = explode('-', $dateRange);
            list($start_date, $end_date) = $date;
            $start_date = strtotime(trim($start_date) . " 00:00:00");
            $end_date   = strtotime(trim($end_date) . " 23:59:59");
        } else {
            $crrMonth = (date('Y-m-d'));
            $start_date = strtotime(trim(date("d-m-Y", strtotime('-30 days', strtotime($crrMonth)))) . " 00:00:00");
            $end_date   = strtotime(trim(date('Y-m-d')) . " 23:59:59");
        }

        $query->whereBetween('created', [$start_date, $end_date]);
    }
}
