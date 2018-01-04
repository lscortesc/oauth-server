<?php

namespace Oauth\Traits;

/**
 * Class ResponseTrait
 * @package Oauth\Traits
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