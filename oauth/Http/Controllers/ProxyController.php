<?php

namespace Oauth\Http\Controllers;

use Oauth\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Oauth\Http\Requests\LoginRequest;
use Oauth\Services\LoginProxyService;


/**
 * Class ProxyController
 * @package Oauth\Http\Controllers
 */
class ProxyController extends Controller
{
    use ResponseTrait;

    /**
     * @var LoginProxyService
     */
    private $proxy;

    /**
     * ProxyController constructor.
     * @param LoginProxyService $proxy
     */
    public function __construct(LoginProxyService $proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        return $this->response(
            $this->proxy->login($email, $password)
        );
    }
}
