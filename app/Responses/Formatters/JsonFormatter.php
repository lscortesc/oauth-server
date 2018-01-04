<?php

namespace App\Http\Responses\Formatters;

use App\Http\Responses\Contracts\ResponseFormat;

/**
 * Class JsonFormatter
 * @package App\Http\Responses\Formatters
 */
class JsonFormatter implements ResponseFormat
{
    /**
     * @param $data
     * @param $errors
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data = [], $errors = [], $status = 200)
    {
        return response()->json(
            [
                'data' => $data,
                'errors' => $errors,
                'code' => $status,
                'message' => trans("messages.response.$status")
            ],
            $status
        );
    }
}