<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Http\Request\OrderRequest;
use App\Libraries\Couriers\DTDC;
use App\Models\Coupon;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function index()
    {
        try {
            $record = Order::get();

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
            $record = Order::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function store(OrderRequest $request)
    {
        try {
            $coupon = $this->checkCoupon($request->coupon_code); //for coupon
            if (!empty($coupon) && $coupon['status']) {
                $coupon_id =  $coupon['coupon_id'];
            } else {
                return $this->failRes($coupon['msg']);
            }

            $user = User::find(Auth::user()->_id);
            if (empty($user) || $user->trail_point < 1)
                return $this->failRes('Trail Point not avaliable.');

            $user->trail_point = (int)$user->trail_point - (int)$request->trail_point;
            $user->save();

            $save = new Order();
            $save->order_number          = rand(100000, 999999);
          	$save->user_id 			     = $request->user;
            $save->order_date            = (int)$request->order_date;
            $save->amount                = $request->amount;
            $save->trail_point           = (int)$request->trail_point;
            $save->payment_mode          = $request->payment_mode;
            $save->tax_amount            = $request->tax_amount;
            $save->shipping_cost         = $request->shipping_cost;
            $save->status                = $request->status;
            $save->order_status          = 'pending';
            $save->shipping_details      = $request->shipping_details;
            $save->billing_details       = $request->billing_details;
            if (!empty($request->coupon_code)) {
                $save->coupon_code           = $request->coupon_code;
                $save->coupon_id             = $coupon_id;
            }

            $products = array();
            foreach ($request->products as $product) {
                $pro = Product::find($product['product_id']);
                $product['image'] = $pro->image;
                $products[] = $product;
            }

            $save->products   = $products;

            if (!$save->save())
                return $this->failRes('Order not Created.');

            $user = User::find($request->user_id);
            $trail_point =  $user->trail_point;
            $user->trail_point = (int)$trail_point - $request->trial_point;
            $user->save();
            //here is courier DTDC Api
            $dtdc = new DTDC();
            $res = $dtdc->shipOrder($save);

            $order = Order::find($save->_id);
            $order->courier = 'DTDC';
            $order->response     = !empty($res['response']) ? $res['response'] : '';
            $order->api_response = !empty($res['api_response']) ? $res['api_response'] : '';
            $order->courier_status = 'shipped';
            $order->save();

            //return $this->recordRes($user);
            return $this->successRes('Order Created Successfully.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $save = Order::find($id);
            $save->status    = $request->status;

            if (!$save->save())
                return $this->failRes('Order not updated.');

            return $this->successRes('Order updated Successfully.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    private function checkCoupon($coupon)
    {
        $coupon = Coupon::where('coupon_code', $coupon)->where('coupon_qty', '>', 0)->where('status', 1)->first();
        if (empty($coupon))
            return ['status' => false, 'msg' => 'Invalid Coupon Code.'];

        $coupon_id = $coupon->_id;
        if ($coupon->expiry < strtotime(date('Y-m-d H:i'))) //validate coupon expiry time
            return ['status' => false, 'msg' => 'Coupon is Expired.'];

        $user = User::find(Auth::user()->_id);
        if (is_array($user->coupon_ids) && in_array($coupon_id, $user->coupon_ids)) //validate reapete used coupon
            return ['status' => false, 'msg' => 'This coupon is already used.'];

        $qty = $coupon->coupon_qty;
        $updated_qty = $qty - 1;
        $coupon->coupon_qty = $updated_qty;
        $coupon->save();

        //for update coupon ids in user collection
        $user->coupon_ids[] = $coupon_id;
        $user->save();

        return ['status' => true, 'coupon_id' => $coupon_id];
    }
}
