<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Auth;
use App\Observers\Timestamp;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    const DELETED_AT = 'deleted';


    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


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

    public function Product(){

        return $this->hasOne(Product::class,'user_id','_id')->select('*');
    }
}
