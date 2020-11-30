<?php

namespace App\Http\Responses\Generic;

trait SwapiResponse
{
    /**
     * Resource not allowed response type.
     *
     * @return Response
     */
    public static function sendResourceNotAllowedResponse()
    {
        return response()->json(['message' => 'This resource is not in allowed list'], 503);
    }
}