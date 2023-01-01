<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Libraries\Couriers\DTDC;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        try {
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

            $request->request->remove('page');
            $request->request->remove('perPage');
            $request->except(['perPage', 'page']);
            // $request->request->remove('perPage');
            // unset($request['perPage']);
            $data['filter']  = $request->all();
            // print_r($data['filter']);
            // die;
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

            if (!$save->save())
                return response(['status' => false, 'msg' => 'Status Not Update.']);

            return response(['status' => true, 'msg' => 'Status Updated Successfully.']);
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
