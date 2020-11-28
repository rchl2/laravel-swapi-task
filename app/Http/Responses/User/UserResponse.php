<?php

namespace App\Http\Responses\User;

trait UserResponse
{
    /**
     * User was created with token response type.
     *
     * @return void
     */
    protected function userCreatedWithTokenResponse($code, string $token)
    {
        return response()->json([
            'code' => $code ?? 200,
            'token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
