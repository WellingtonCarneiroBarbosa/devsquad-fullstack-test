<?php

namespace App\Actions\Exam;

use GuzzleHttp\Client;

class ConsumeAPI
{
    public static function execute()
    {
        $client = new Client([
            'base_uri' => config('services.exam.endpoint'),
            'timeout'  => 10.0,
        ]);

        $tokens = self::getToken($client);

        $response = $client->request('GET', 'api/me', [
            'headers' => [
                'Authorization' => 'Bearer ' . $tokens['access_token'],
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ],
        ]);

        $user_data = json_decode($response->getBody()->getContents(), true);

        return $user_data;
    }

    /**
     * Get the user token
     *
     * @param \GuzzleHttp\Client $client
     * @return array
     */
    protected static function getToken($client): array
    {
        $response =  $client->post('/oauth/token', [
            'form_params' => [
                'grant_type'    => 'password',
                'client_id'     => '3',
                'client_secret' => 'Fql3okYQbbzDtlmhBXdLE2eWy3OR9MR9x3n9NwqL',
                'username' => 'joe@doe.com',
                'password' => 'secret',
                'scope' => '*'
            ]
        ]);

        $tokens = json_decode($response->getBody()->getContents(), true);

        return $tokens;
    }
}
