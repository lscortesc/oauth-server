<?php

namespace App\Services\Proxies;

use App\Exceptions\InvalidCredentialsException;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;

class LoginProxy
{
    private $auth;

    private $client;

    public function __construct()
    {
        $this->auth = App::make('auth');

        $this->client = new Client([
            'base_uri' => env('APP_URL')
        ]);
    }

    public function login(string $email, string $password)
    {
        $user = User::where('email', $email)->first();

        if (! $user) {
            throw new InvalidCredentialsException();
        }

        return $this->requestToken('password', [
            'username' => $user->email,
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

        $response = $this->client->post('oauth/token', $data);

        dd($response);
    }
}