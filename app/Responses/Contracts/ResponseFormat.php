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
    public function response(array $data = [], array $errors = [], int $status = 200);

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data);
}