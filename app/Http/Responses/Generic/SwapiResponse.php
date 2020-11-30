<?php

namespace App\Http\Responses\Generic;

trait SwapiResponse
{
    /**
     * Resource not allowed response.
     *
     * @return Response
     */
    public static function sendResourceNotAllowedResponse()
    {
        return response()->json(['message' => 'This resource is not in allowed list'], 503);
    }

    /**
     * Send resource not found response.
     *
     * @return Response
     */
    public static function sendResourceNotFoundResponse()
    {
        return response()->json(['message' => 'This resource was not found on SWAPI routes'], 503);
    }
}