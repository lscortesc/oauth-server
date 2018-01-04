<?php

namespace App\Http\Controllers\Auth;

use App\Services\Proxies\LoginProxy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\Traits\ResponseTrait;

class ProxyController extends Controller
{
    use ResponseTrait;

    private $proxy;

    public function __construct(LoginProxy $proxy)
    {
        $this->proxy = $proxy;
    }

    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        return $this->response(
            $this->proxy->login($email, $password)
        );
    }
}
