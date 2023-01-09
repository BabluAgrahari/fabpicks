<?php

namespace App\Traits;

use function PHPUnit\Framework\isEmpty;

trait Response
{
    public function recordsRes($record)
    {
        if ($record->isEmpty())
            return $this->default();

        return response()->json([
            'status' => true,
            'code' => 200,
            'count' => $record->count() ?? 0,
            'records' => $record
        ]);
    }

    public function recordRes($record)
    {
        if (empty($record))
            return $this->default();

        return response()->json([
            'status' => true,
            'code' => 200,
            'record' => $record
        ]);
    }

    public function successRes($msg = false)
    {
        if (!$msg)
            return $this->default();

        return response()->json([
            'status' => true,
            'code' => 200,
            'msg' => $msg
        ]);
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
            'status' => false,
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
