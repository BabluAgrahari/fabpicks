<?php

namespace App\Libraries\Couriers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class DTDC
{
    public $base_url;
    function __construct()
    {
        $this->base_url = 'https://demodashboardapi.shipsy.in/api/';
    }
    function shipOrder($request)
    {
        $request = (object)$request;
        $billing = (object)$request->billing_details;

        foreach ($request->products as $product) {
            $product = (object)$product;
            $orderItems[] = array(
                'description' => $product->name,
                'declared_value' => $product->mrp,
                'weight' => '0.5',
                'height' => '5',
                'length' => '5',
                'width' => '5',
            );
        }

        $payload['consignments'][] = array(
            'customer_code' => env('CUSTOMER_CODE', 'LL1696'),
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

        $api_response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'api-key' => 'e6b5ca18f81925de0b0004d66dbb16'
        ])->post($this->base_url . 'customer/integration/consignment/softdata', $payload);

        $response = array();
        if ($api_response->status()) {
            $response = json_decode($api_response);
            $apiResponse = $response->data;
            $res = $response->data[0];
            $response = [
                'success' => $res->success ?? '',
                'reference_number' => $res->reference_number ?? '',
                'courier_partner' => $res->courier_partner ?? '',
                'courier_account' => $res->courier_account ?? '',
                'courier_partner_reference_number' => $res->courier_partner_reference_number ?? '',
                'third_party_pickup_id' => $res->third_party_pickup_id ?? '',
                'barCodeData' => $res->barCodeData ?? '',
                'customer_reference_number' => $res->customer_reference_number ?? '',
                'pieces_ref_no' => !empty($res->pieces[0]->reference_number) ? $res->pieces[0]->reference_number : ''
            ];
        }

        return ['response' => $response, 'api_response' => $apiResponse];
    }


    public function tracking($reference_ids)
    {
        foreach ($reference_ids as $id) {
            $payload = [
                'reference_number' => $id
            ];
            $api_response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'api-key' => 'e6b5ca18f81925de0b0004d66dbb16'
            ])->get($this->base_url . 'customer/integration/consignment/track', $payload);

            if ($api_response->status() == 200) {
                $response = json_decode($api_response);
                $status = $response->status;

                $order = Order::where('response.reference_number', $id)->first();
                switch ($status) {
                    case "softdata_upload":
                        $status = 'shipped';
                        break;
                    case 'delivered':
                        $status = 'delivered';
                        break;
                    default:
                        $status = $status;
                        break;
                }
                $order->courier_status = $status;
                $order->save();

                if ($order->status == 'delivered') {
                    $user = User::find($order->user_id);
                    $user->trail_point = 6;
                    $user->save();
                }
            }
        }

        return true;
    }

    public function cancel($awb_no)
    {
        $payload = [
            'AWBNo' => $awb_no,
            'customerCode' => 'LL1696'
        ];
        $api_response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'api-key' => 'e6b5ca18f81925de0b0004d66dbb16'
        ])->post('http://dtdcapi.shipsy.io/api/customer/integration/consignment/cancel', $payload);

        print_r($api_response);
        die;
    }
}
