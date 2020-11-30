<?php

namespace App\Http\Responses\User;

use App\Models\User;
use App\Http\Resources\UserResource;

trait UserResponse
{
    /**
      * User success authorization response with token.
      *
      * @param string $token
      *
      * @return Response
    */
    public static function sendSuccessAuthorizationResponse(string $token)
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

    /**
     * User authorized response.
     *
     * @param User $user
     *
     * @return UserResource
     */
    public function userAuthorizedResponse(User $user)
    {
        return new UserResource($user);
    }

    /**
     * User e-mail updated response.
     *
     * @return Response
     */
    public function userEmailUpdatedResponse()
    {
        return response()->json(['message' => 'Email was updated'], 200);
    }
}
