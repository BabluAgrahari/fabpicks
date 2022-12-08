<?php

namespace App\Http\Controllers\crm;

use App\Http\Controllers\Controller;
use App\Models\PushNotification;
use Illuminate\Http\Request;
use App\Http\Request\NotificationRequest;
use Exception;

class PushController extends Controller
{
    public function index(Request $request)
    {
        try {

           $query = PushNotification::userAccess();

            if (!empty($request->title))
                $query->where('title', 'LIKE', "%$request->title%");

                if (!empty($request->discription))
                $query->where('discription', 'LIKE', "%$request->discription%");

                if (!empty($request->type))
                $query->where('type', 'LIKE', "%$request->type%");

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);

            $request->request->remove('page');
            $request->request->remove('perPage');
            $data['filter']  = $request->all();
            return view('crm.pushNotification.list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function store(NotificationRequest $request)
    {
        try {
            $save = new PushNotification();
            $save->user_group       = $request->user_group;
            $save->subject          = $request->subject;
            $save->notification     = $request->notification;

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'pushNotification');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Push Notification Added Successfully.']);
            return response(['status' => false, 'msg' => 'Push Notification not Added.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $record = PushNotification::find($id);
            return response(['status' => true, 'record' => $record]);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update(NotificationRequest $request, $id)
    {
        try {
            $save = PushNotification::find($id);
            $save->user_group       = $request->user_group;
            $save->subject          = $request->subject;
            $save->notification     = $request->notification;

            if (!empty($request->file('icon')))
                $save->icon  = singleFile($request->file('icon'), 'pushNotification');

            if ($save->save())
                return response(['status' => true, 'msg' => 'Push Notification Update Successfully.']);
            return response(['status' => false, 'msg' => 'Push Notification not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }
}
