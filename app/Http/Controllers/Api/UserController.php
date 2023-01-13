<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\http\Request\UserRequest;
use App\Models\Reward;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show($id)
    {
        try {
            $record = User::find($id);
            return $this->recordRes($record);
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        //return json_encode($request->all());
        try {

            $save = User::find($id);
            $save->name    = $request->name;
            $save->email   = $request->email;
            $save->city    = $request->city;
            $save->state   = $request->state;
            $save->pincode = $request->pincode;
            $save->address = $request->address;
            // $save->role = 'customer';
            if (!empty($request->file('image')))
                $save->image  = singleFile($request->file('image'), 'user');

            if ($save->save())
                return $this->successRes('Account Updated Successfully.');

            return $this->failRes('Account not Updated.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }


    public function storeReward(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'reward_point' => 'required|numeric',
                'type' => 'required|in:credit,debit',
                'reward_by' => 'required',
                'product_id' => 'nullable|string'
            ]);

            if ($validator->fails())
                return $this->validationRes($validator->messages());

            $save = new Reward();
            $save->user_id = Auth::user()->_id;
            $save->reward_point = (int)$request->reward_point;
            $save->type = $request->type;
            $save->reward_by = $request->reward_by;

            if ($request->product_id)
                $save->product_id = $request->product_id;

            if (!$save->save())
                return $this->failRes('Reward not Added.');

            //for update reward in use collection
            $user = User::find(Auth::user()->_id);
            $exist_reword = $user->reward_point ?? 0;
            $all_reward = $exist_reword;

            if ($save->type == 'credit') {
                $all_reward = $exist_reword + $save->reward_point;
            } else if ($save->type == 'debit') {
                $all_reward = $exist_reword - $save->reward_point;
            }
            $user->reward_point = $all_reward;
            $user->save();

            //for closing rewards
            $reward_id = $save->_id;
            $reward = Reward::find($reward_id);
            $reward->closing_reward = $all_reward;
            $reward->save();

            return $this->successRes('Reward Added Successfully.');
        } catch (Exception $e) {
            return $this->failRes($e->getMessage());
        }
    }
}
