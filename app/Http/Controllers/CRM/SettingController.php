<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function generalIndex()
    {
        $data['res'] = Setting::first();
        return view('crm.setting.generalSetting', $data);
    }

    public function generalupdate(Request $request, $id)
    {
        $save = Setting::find($id);
        $save->general_setting = $request->general_setting;

        if ($save->save())
            return redirect()->back()->with('success', 'General Setting Updated Successfully.');

        return redirect()->back()->with('error', 'General Setting Not Updated ');
    }


    public function aboutusIndex()
    {
        $data['res'] = Setting::first();
        return view('crm.aboutus.aboutus',$data);
    }


    public function aboutupdate(Request $request, $id)
    {
        $save = Setting::find($id);
        $save->aboutus = $request->aboutus;

        if ($save->save())
            return redirect()->back()->with('success', 'About Us Updated Successfully.');

        return redirect()->back()->with('error', 'About Us Not Updated ');
    }

    public function privacyIndex()
    {
        $data['res'] = Setting::first();
        return view('crm.privacyPolicy.privacyPolicy',$data);
    }

    public function privacyupdate(Request $request, $id)
    {
        $save = Setting::find($id);
        $save->privacy = $request->privacy;

        if ($save->save())
            return redirect()->back()->with('success', 'Privacy Policy Updated Successfully.');

        return redirect()->back()->with('error', 'Privacy Policy Not Updated ');
    }

    public function conditionsIndex()
    {
        $data['res'] = Setting::first();
        return view('crm.conditions.conditions',$data);
    }

    public function conditionsupdate(Request $request, $id)
    {
        $save = Setting::find($id);
        $save->conditions = $request->conditions;

        if ($save->save())
            return redirect()->back()->with('success', 'Conditions Updated Successfully.');

        return redirect()->back()->with('error', 'Conditions Not Updated ');
    }

    public function refundIndex()
    {
        $data['res'] = Setting::first();
        return view('crm.refundPolicy.refundPolicy',$data);
    }


    public function refundupdate(Request $request, $id)
    {
        $save = Setting::find($id);
        $save->refund = $request->refund;

        if ($save->save())
            return redirect()->back()->with('success', 'Refund Policy Updated Successfully.');

        return redirect()->back()->with('error', 'Refund Policy Not Updated ');
    }
}
