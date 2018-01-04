<?php

namespace Oauth\Services;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\App;
use Oauth\Exceptions\InvalidCredentialsException;
use Oauth\Formatter\JsonFormatter;

/**
 * Class LoginProxyService
 * @package Oauth\Services
 */
class LoginProxyService
{
    /**
     * Refresh Token's cookie name
     */
    const REFRESH_TOKEN = 'refresh_token';

    /**
     * One day to seconds
     */
    const DAY_TO_SECONDS = 86400;

    /**
     * @var Auth
     */
    private $auth;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var CookieJar
     */
    private $cookie;

    /**
     * LoginProxy constructor.
     */
    public function __construct()
    {
        $this->auth = App::make('auth');
        $this->client = new Client([
            'base_uri' => env('APP_URL')
        ]);
        $this->cookie = App::make('cookie');
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     */
    public function login(string $email, string $password)
    {
        $user = User::where('email', $email)->first();

        if (! $user) {
            throw new InvalidCredentialsException();
        }

        return $this->requestToken('password', [
            'username' => $email,
            'password' => $password
        ]);
    }

    public function requestToken(string $grantType, array $data = []): array
    {
        $data = array_merge($data, [
            'client_id' => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type' => $grantType
        ]);

        $response = $this->client->request('POST', 'oauth/token', [
            'json' => $data,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Format' => 'json'
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new InvalidCredentialsException();
        }

        $formatter = new JsonFormatter();
        $data = $formatter->decode($response->getBody());

        $this->cookie->queue(
            self::REFRESH_TOKEN,
            $data->refresh_token,
            self::DAY_TO_SECONDS,
            null,
            null,
            false,
            false
        );

        return [
            'access_token' => $data->access_token,
            'expires_in' => $data->expires_in,
            'refresh_token' => $data->refresh_token
        ];
    }
}