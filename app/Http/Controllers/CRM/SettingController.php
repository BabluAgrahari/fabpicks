<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function generalIndex()
    {
        try {
            $data['res'] = Setting::first();
            return view('crm.setting.generalSetting', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function generalupdate(Request $request, $id)
    {
        try {
            $save = Setting::find($id);
            $save->general_setting = $request->general_setting;

            if ($save->save())
                return redirect()->back()->with('success', 'General Setting Updated Successfully.');

            return redirect()->back()->with('error', 'General Setting Not Updated ');
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }


    public function aboutusIndex()
    {
        try {
            $data['res'] = Setting::first();
            return view('crm.aboutus.aboutus', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }


    public function aboutupdate(Request $request, $id)
    {
        try {
            $save = Setting::find($id);
            $save->aboutus = $request->aboutus;

            if ($save->save())
                return redirect()->back()->with('success', 'About Us Updated Successfully.');

            return redirect()->back()->with('error', 'About Us Not Updated ');
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function privacyIndex()
    {
        try {
            $data['res'] = Setting::first();
            return view('crm.privacyPolicy.privacyPolicy', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function privacyupdate(Request $request, $id)
    {
        try {
            $save = Setting::find($id);
            $save->privacy = $request->privacy;

            if ($save->save())
                return redirect()->back()->with('success', 'Privacy Policy Updated Successfully.');

            return redirect()->back()->with('error', 'Privacy Policy Not Updated ');
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function conditionsIndex()
    {
        try {
            $data['res'] = Setting::first();
            return view('crm.conditions.conditions', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function conditionsupdate(Request $request, $id)
    {
        try {
            $save = Setting::find($id);
            $save->conditions = $request->conditions;

            if ($save->save())
                return redirect()->back()->with('success', 'Conditions Updated Successfully.');

            return redirect()->back()->with('error', 'Conditions Not Updated ');
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }

    public function refundIndex()
    {
        try {
            $data['res'] = Setting::first();
            return view('crm.refundPolicy.refundPolicy', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }


    public function refundupdate(Request $request, $id)
    {
        try {
            $save = Setting::find($id);
            $save->refund = $request->refund;

            if ($save->save())
                return redirect()->back()->with('success', 'Refund Policy Updated Successfully.');

            return redirect()->back()->with('error', 'Refund Policy Not Updated ');
        } catch (Exception $e) {
            return redirect('500')->with(['erroe', $e->getMessage()]);
        }
    }
}
