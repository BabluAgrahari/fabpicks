<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Libraries\Couriers\DTDC;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {

            Log::critical('demo');

            $query = Order::query();

            if (!empty($request->order_number))
                $query->where('order_number', (int)$request->order_number);

            if (!empty($request->order_date))
                $query->where('order_date', 'LIKE', "%$request->order_date%");

            if (!empty($request->amount))
                $query->where('amount', 'LIKE', "%$request->amount%");

            if (!empty($request->Status))
                $query->where('status', $request->status);

            $perPage = !empty($request->perPage) ? $request->perPage : config('global.perPage');
            $data['lists'] = $query->dateRange($request->date_range)->latest()->paginate($perPage);
            unset($request['perPage']);
            unset($request['page']);
            $data['filter'] = $request->all();

            return view('crm/order/list', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }

    public function details($id)
    {
        $data['show'] = Order::with(['User'])->find($id);

        $user_id = $data['show']->user_id;
        $data['totalOrder'] = Order::where('user_id', $user_id)->count();
        // pr($data['show']->toArray());die;
        return view('crm/order/orderdetails', $data);
    }

    public function update(Request $request, $id)
    {
        // pr($request->all());
        try {
            $save = Order::find($id);
            $save->order_status      = $request->order_status;

            if ($save->save())
                if ($save->order_status == 'delivared') {
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

    public function orderCancel($id)
    {
        try {
            $order = Order::find($id);
            $order->order_status = 'cancled';
            if (!$order->save())
                return response(['status' => false, 'msg' => 'Something went wrong.']);

            //call order cancled api
            $dtdc = new DTDC();
            $res = $dtdc->cancel($order);

            return response(['status' => true, 'msg' => 'Order Canceled Successfully.']);
        } catch (Exception $e) {
            return response(['status' => true, 'msg' => $e->getMessage()]);
        }
    }
}
