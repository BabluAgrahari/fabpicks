<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\PushNotification;
use Illuminate\Http\Request;
use App\Http\Request\NotificationRequest;

class PushController extends Controller
{
    public function index()
    { 
        $data['lists'] = PushNotification::all(); 
        return view('crm.pushNotification.list',$data);
    }

    public function store(NotificationRequest $request)
    {
        $save = new PushNotification();
        $save->user_group       =$request->user_group;
        $save->subject          =$request->subject;
        $save->notification     =$request->notification;

        if (!empty($request->file('icon')))
        $save->icon  = singleFile($request->file('icon'), 'pushNotification');

        if ($save->save())
        return response(['status' => true, 'msg' => 'Push Notification Added Successfully.']);
    return response(['status' => false, 'msg' => 'Push Notification not Added.']);
    }

    public function edit($id)
    {
        $record = PushNotification::find($id);
        return response(['status'=>true,'record'=>$record]);
    }

    public function update(NotificationRequest $request, $id)
    {
        $save = PushNotification::find($id);
        $save->user_group       =$request->user_group;
        $save->subject          =$request->subject;
        $save->notification     =$request->notification;

        if (!empty($request->file('icon')))
        $save->icon  = singleFile($request->file('icon'), 'pushNotification');

        if ($save->save())
        return response(['status' => true, 'msg' => 'Push Notification Update Successfully.']);
    return response(['status' => false, 'msg' => 'Push Notification not Update.']);
    }

    public function destroy($id)
    {
        //
    }
}
