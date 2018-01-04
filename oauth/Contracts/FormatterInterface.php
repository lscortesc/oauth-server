<?php

namespace Oauth\Contracts;

/**
 * Interface FormatterInterface
 * @package Oauth\Contracts
 */
interface FormatterInterface
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