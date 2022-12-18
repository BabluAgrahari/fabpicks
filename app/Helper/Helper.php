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
            $profileImage = date('YmdHis') . rand(111, 999) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $fileName = "$profileImage";

            return asset($folder) . '/' . $fileName;
        }
        return false;
    }
}


if (!function_exists('multiFile')) {

    function multiFile($files, $folder)
    {
        $fileNames = [];
        foreach ($files as $key => $file) {
            if ($file) {
                if (!file_exists($folder))
                    mkdir($folder, 0777, true);

                $filename = date('YmdHis') . rand(111, 999) . "." . $file->getClientOriginalExtension();
                $file->move(public_path() . '/' . $folder, $filename);
                $fileNames[$key] =  asset($folder) . '/' . $filename; //$filename;
            }
        }
        return $fileNames;
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


function defaultImg($size = '100x100')
{
    return 'https://via.placeholder.com/' . $size;
}

if (!function_exists('isClient')) {
    function isClient()
    {
        return Auth::user()->role == 'client' ? true : false;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return Auth::user()->role == 'admin' ? true : false;
    }
}


if (!function_exists('listStatus')) {

    function listStatus($status, $id)
    {
        return $status == 1 ? '<a href="javascript:void(0)">
        <span class="activeVer badge bg-success" _id="' . $id . '" val="0">Active</span></a>'
            : '<a href="javascript:void(0);"><span class="activeVer badge bg-warning" _id="' . $id . '" val="1">Inactive</span></a>';
    }
}

function getLatitude()
{
    $ip  = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    $url = "http://freegeoip.net/json/$ip";
    $ch  = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($ch);
    curl_close($ch);
    pr($data);
    die;
    if ($data) {
        $location = json_decode($data);

        $lat = $location->latitude;
        $lon = $location->longitude;

        $sun_info = date_sun_info(time(), $lat, $lon);
        print_r($sun_info);
        die;
    }
    die;
}
