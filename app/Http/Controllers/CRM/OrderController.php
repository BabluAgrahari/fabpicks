<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $query = Order::query();

        if (!empty($request->order_number))
            $query->where('order_number', (int)$request->order_number);

        if (!empty($request->order_date))
            $query->where('order_date', 'LIKE', "%$request->order_date%");

        if (!empty($request->amount))
            $query->where('amount', 'LIKE', "%$request->amount%");

        if (!empty($request->Status))
            $query->where('Status',$request->status);

        $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
        $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);
        $request->request->remove('page');
        $request->request->remove('perPage');
        $data['filter']  = $request->all();
        return view('crm/order/list', $data);
        try {
            return view('crm/order/list');
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function details($id)
    {
        $data['shows']=Order::with(['User','Product'])->find($id);
        // pr($data['shows']);
        return view('crm/order/orderdetails',$data);
    }

    public function update(Request $request, $id)
    {
        // pr($request->all());
        try {
            $save = Order::find($id);
            $save->order_status        = $request->order_status;

            if ($save->save())
              	if($save->order_status == 'delivared') {
              		$user = User::find($save->user_id);
              		$user->trail_point = 6;
              		$user->save();
            	}
          	
                return response(['status' => true, 'msg' => 'Status Updared Successfully.']);

            return response(['status' => false, 'msg' => 'Status Not Update.']);
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => $e->getMessage()]);
        }
    }
}
