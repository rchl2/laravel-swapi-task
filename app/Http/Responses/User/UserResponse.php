<?php

namespace App\Http\Responses\User;

trait UserResponse
{
    /**
      * User token was created response type.
      *
      * @param string $token
      *
      * @return Response
    */
    public static function userTokenCreatedResponse(string $token)
    {
        return response()->json([
            'code' => 201,
            'token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * User created response.
     *
     * @param User $user
     *
     * @return UserResource
     */
    public static function userCreatedResponse(User $user)
    {
        return new UserResource($user);
    }
}
