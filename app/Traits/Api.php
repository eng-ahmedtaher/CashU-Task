<?php

namespace App\Traits;

trait Api {

    public function getData($data = null, $status = true, $code = 200, $message = null, $options = null)
    {
        return response()->json([

            'data' => $data,
            'status' => $status, // True or False
            'code' => $code, // ex: 200, 201, 401, 404
            'message' => $message,
            'options' => $options, // url or any options, 

        ]);
    }

}