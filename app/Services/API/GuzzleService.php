<?php

namespace App\Services\SWAPI;

trait GuzzleService
{
    /**
     * Send GET request.
     *
     * @param string $route
     * @param array $headers
     *
     * @return object|null
     */
    protected function get(string $route, array $headers): ?object
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