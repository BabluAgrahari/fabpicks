<?php

namespace App\Traits;

use function PHPUnit\Framework\isEmpty;

trait Response
{
    public function recordRes($record)
    {
        if (empty($record))
            return $this->default();

        return response()->json([
            'status' => true,
            'code' => 200,
            'count' => $record->count() ?? 0,
            'record' => $record
        ]);
    }

    public function successRes($msg = false)
    {
        if (!$msg)
            return $this->default();

        $res = [
            'status' => true,
            'code' => 200,
        ];

        if (is_array($msg)) {
            $res['data'] = $msg;
        } else {
            $res['msg'] = $msg;
        }
        return response()->json($res);
    }


    public function failRes($msg = false)
    {
        if (!$msg)
            return $this->default();

        return response()->json([
            'status' => false,
            'code' => 403,
            'msg' => $msg
        ]);
    }


    public function validationRes($error)
    {

        if (empty($error))
            return $this->default();

        return response()->json([
            'status' => false,
            'code' => 400,
            'validation' => $error
        ]);
    }


    public function unauthorizedRes($msg = false)
    {

        if (!$msg)
            return $this->default();

        return response()->json([
            'status' => false,
            'code' => 401,
            'msg' => $msg
        ]);
    }

    public function notFoundRes()
    {

        return response()->json([
            'stauts' => false,
            'code' => 404,
            'msg' => 'Not Found.'
        ]);
    }

    public function default()
    {

        return response()->json([
            'status' => false,
            'code' => 428,
            'msg' => 'Parameter is missing.'
        ]);
    }
}
