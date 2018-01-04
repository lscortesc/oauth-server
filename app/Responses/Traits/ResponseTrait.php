<?php

namespace App\Http\Responses\Traits;

/**
 * Class ResponseTrait
 * @package App\Http\Responses\Traits
 */
trait ResponseTrait
{
    /**
     * @param $data
     * @param $errors
     * @param $status
     * @return mixed
     */
    public function response($data = [], $errors = [], $status = 200)
    {
        return request()->formatter->response($data, $errors, $status);
    }
}