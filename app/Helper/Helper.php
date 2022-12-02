<?php

use App\Models\EmployeeCommission;
use App\Models\Outlet;
use App\Models\TransferHistory;
use App\Models\User;
use App\Models\Webhook;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;

if (!function_exists('uniqCode')) {
    function uniqCode($lenght)
    {
        // uniqCode
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return strtoupper(substr(bin2hex($bytes), 0, $lenght));
    }
}

if (!function_exists('singleFile')) {

    function singleFile($file, $folder)
    {
        $folder = strtolower($folder);
        if ($file) {
            if (!file_exists($folder))
                mkdir($folder, 0777, true);

            $destinationPath = public_path() . '/' . $folder;
            $profileImage = date('YmdHis').rand(111,999) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $fileName = "$profileImage";

            return asset($folder).'/'.$fileName;
        }
        return false;
    }
}


if (!function_exists('pr')) {
    function pr($data)
    {
        echo "<pre>";
        print_r($data);
        echo '</pre>';
        die;
    }
}

function ip_address()
{
    return !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
}

function settinglogo()
{
    $res = Setting::first();
    // print_r($res);die;
    return $res;
}


function defaultImg($size='100x100'){
    return 'https://via.placeholder.com/'.$size;
}


