<?php

namespace App\Http\Responses\Contracts;

/**
 * Interface ResponseFormat
 * @package App\Http\Responses\Contracts
 */
interface ResponseFormat
{
    /**
     * @param $data
     * @param $errors
     * @param int $status
     * @return \HttpResponse Response
     */
    public function response($data = [], $errors = [], $status = 200);
}