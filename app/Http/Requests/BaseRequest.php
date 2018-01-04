<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Responses\Traits\ResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Responses\Formatters\JsonFormatter;
use Illuminate\Http\Exceptions\HttpResponseException;


/**
 * Class BaseRequest
 * @package App\Http\Requests
 */
class BaseRequest extends FormRequest
{
    use ResponseTrait;

    /**
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            $this->response([], $validator->errors()->getMessages(), 422)
        );
    }
}