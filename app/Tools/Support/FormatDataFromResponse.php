<?php

namespace App\Tools\Support;

trait FormatDataFromResponse
{
    /**
     * Get decoded data from JSON response.
     *
     * @param string $responseContent
     */
    protected function formatJsonDataResponse(string $responseContent)
    {
        return $response = json_decode($responseContent, true);
    }
}
