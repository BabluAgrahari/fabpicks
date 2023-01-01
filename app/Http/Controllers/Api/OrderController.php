<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Http\Request\OrderRequest;
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
            $user = User::find(Auth::user()->_id);
            // if (empty($user) || $user->trail_point < 1)
            //     return $this->failRes('Trail Point not Avaliable.');

            $user->trail_point = (int)$user->trail_point - (int)$request->trail_point;
            $user->save();

            $save = new Order();
            $save->order_number          = rand(100000, 999999);
            $save->order_date            = (int)strtotime($request->order_date);
            $save->amount                = $request->amount;
            $save->trail_point           = (int)$request->trail_point;
            $save->payment_mode          = $request->payment_mode;
            $save->tax_amount            = $request->tax_amount;
            $save->shipping_cost         = $request->shipping_cost;
            $save->status                = $request->status;
            $save->order_status          = 'pending';
            $save->shipping_details      = $request->shipping_details;
            $save->billing_details       = $request->billing_details;

            $products = array();
            foreach ($request->products as $product) {
                $pro = Product::find($product['product_id']);
                $product['image'] = $pro->image;
                $products[] = $product;
            }

            $save->products   = $products;

            if (!$save->save())
                return $this->failRes('Order not Created.');

            //for order to courier
            $this->DtDC($save);
            die;
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

            if ($save->save())
                return $this->successRes('Order updated Successfully.');

            return $this->failRes('Order not updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


    private function DtDC($request)
    {
        $request = (object)$request;
        $billing = (object)$request->billing_details;

        foreach ($request->products as $product) {
            $product = (object)$product;
            $orderItems[] = array(
                'description' => $product->name,
                'declared_value' => $product->price,
                'weight' => '0.5',
                'height' => '5',
                'length' => '5',
                'width' => '5',
            );
        }

        // print_r($request);
        // die;
        $payload['consignments'][] = array(
            'customer_code' => 'LL1696',
            'service_type_id' => env('SERVICE_TYPE_ID', 'B2C PRIORITY'),
            'load_type' => env('LOAD_TYPE', 'NON-DOCUMENT'),
            'commodity_id' => env('COMMODITY_ID', '7'),
            'description' => 'Fabpiks order delivery',
            'customer_reference_number' => $request->order_number,
            'invoice_date' => date($request->created),
            'consignment_type' => env('CONSIGNMENT_TYPE', 'Forward'),
            'dimension_unit' => '',
            'length' => '1',
            'width' => '1.5',
            'height' => '1.5',
            'weight_unit' => 'kg',
            'weight' => '0.25',
            'declared_value' => $request->amount,
            // 'num_pieces' => count($products) + count($samples),
            'num_pieces' => '1',
            'is_risk_surcharge_applicable' => false,
            // 'cod_favor_of' => $order->name,
            'cod_collection_mode' => 'Cash',
            'cod_amount' => $request->amount,
            'origin_details' => array(
                'name' => env('ORIGIN_NAME', 'Fabpiks'),
                'phone' => env('ORIGIN_PHONE', '9910022095'),
                'address_line_1' => env('ORIGIN_ADDRESS', 'Plot no 76, Bamnoli, Dwarka Sec 28'),
                'address_line_2' => '',
                'pincode' => env('ORIGIN_PINCODE', '110077'),
                'city' => env('ORIGIN_CITY', 'Delhi'),
                'state' => env('ORIGIN_STATE', 'Delhi')
            ),
            'destination_details' => array(
                'name' => $billing->name,
                'phone' => $billing->phone,
                'address_line_1' => $billing->address,
                'address_line_2' => '',
                'pincode' => $billing->pincode,
                'city' => $billing->city,
                'state' => $billing->state
            ),
            'piece_detail' => $orderItems
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'api-key' => 'e6b5ca18f81925de0b0004d66dbb16'
        ])->post('https://dtdcapi.shipsy.io/api/customer/integration/consignment/softdata', $payload);

echo response($response);die;
    }
}
