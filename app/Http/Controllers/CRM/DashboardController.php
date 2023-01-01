<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data['lists'] = Order::where('order_status', 'pending')->latest()->paginate(10);
            $data['allOrder'] = Order::count();
            $data['pendingOrder']= Order::where('order_status','pending')->count();
            $data['delviredOrder']= Order::where('order_status','delvired')->count();
            $data['allUser'] = User::count();
            // $data['order'] = Order::selectRaw('CASE WHEN order_status="accept" THEN 1 ELSE 0 END AS order')
            //     ->first();

            // $data['order'] = Order::raw(function ($collection) {
            //     return $collection->aggregate(
            //         [[
            //             '$lookup' => [
            //                 'as' => 'info',
            //                 'from' => 'beroep',
            //                 'foreignField' => 'voornaam',
            //                 'localField' => 'voornaam'
            //             ]
            //         ]]
            //     );
            // });
            // echo "<pre>";
            // print_r($data['order']->toArray());
            // die;
            return view('crm.dashboard', $data);
        } catch (Exception $e) {
            return redirect('500')->with(['error', $e->getMessage()]);
        }
    }
}
