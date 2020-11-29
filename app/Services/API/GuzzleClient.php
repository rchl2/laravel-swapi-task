<?php

namespace App\Services\API;

use GuzzleHttp\Client as Client;

trait GuzzleClient
{
    /**
     * Send GET request.
     *
     * @param string $route
     *
     * @return object|null
     */
    protected function get(string $route): ?object
    {
        $client = $this->buildClient();

        return $client->request('GET', $route, [
            'headers' => $this->buildHeaders(),
        ]);
    }

    /**
     * Build GuzzleHttp client.
     *
     * @return Client
     */
    private function buildClient(): Client
    {
        return $client = new Client([
            'base_uri' => config('swapi.base_uri'),
            'timeout' => 5.0,
            'verify' => config('swapi.verify_ssl'),
        ]);
    }

    /**
     * Build headers for request.
     *
     * @return array
     */
    private function buildHeaders(): array
    {
        return [
            'content-type' => 'application/json',
        ];
    }
}