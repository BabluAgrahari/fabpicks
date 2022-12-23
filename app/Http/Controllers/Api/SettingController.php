<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
// use App\Http\Request\OrderRequest;

use Exception;

class SettingController extends Controller
{
    public function generalSetting(Request $request,$id)
    {
        try {
             $save = Setting::find($id);
            $save->general_setting = $request->general_setting;

            if ($save->save())
                return $this->successRes('General Setting updated Successfully.');

            return $this->failRes('General Setting not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function refundPolicy(Request $request,$id)
    {
        try {
            $save = Setting::find($id);
            $save->refund = $request->refund;

            if ($save->save())
                return $this->successRes('Refund Policy updated Successfully.');

            return $this->failRes('Refund Policy not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function aboutus(Request $request,$id)
    {
        try {
            $save = Setting::find($id);
            $save->aboutus = $request->aboutus;

            if ($save->save())
                return $this->successRes('Aboutus updated Successfully.');

            return $this->failRes('Aboutus not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function conditions(Request $request,$id)
    {
        try {
            $save = Setting::find($id);
            $save->conditions = $request->conditions;

            if ($save->save())
                return $this->successRes('Teams and Conditions updated Successfully.');

            return $this->failRes('Teams and Conditions not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function privacy(Request $request,$id)
    {
        try {
            $save = Setting::find($id);
            $save->privacy = $request->privacy;

            if ($save->save())
                return $this->successRes('Privacy Policy updated Successfully.');

            return $this->failRes('Privacy Policy not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
