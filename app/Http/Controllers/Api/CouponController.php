<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Exception;

class CouponController extends Controller
{
    public function index()
    {
        try {

            $record = Coupon::where('status', 1)->latest()->get();

            if ($record->isEmpty())
                return $this->notFoundRes();

            return $this->recordsRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $record = Coupon::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


    public function findCoupon($coupon_code)
    {
        try {
            $record = Coupon::where('coupon_code', $coupon_code)->first();
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
