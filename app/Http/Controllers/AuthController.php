<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\User\CreateUser;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\User\UserResponse;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\User\UserLoginRequest;

final class AuthController extends Controller
{
    use UserService, UserResponse;
    
    /**
     * Authorized user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authorized(Request $request)
    {
        return $this->userAuthorizedResponse($request->user());
    }

    /**
     * Register user.
     *
     * @param \App\Http\Requests\UserRegisterRequest $request
     *
     * @return Response
     */
    public function register(UserRegisterRequest $request)
    {
        // Dispatch job to create user with validated request data.
        $user = $this->dispatchNow(new CreateUser($request->validated()));

        // Return response with token.
        return $this->userCreatedResponse($user);
    }

    /**
     * Login user.
     *
     * @param UserLoginRequest $request
     *
     * @return Response
     */
    public function login(UserLoginRequest $request)
    {
        // Get credentials from request.
        $credentials = ['email' => $request->email(), 'password' => $request->password()];
        
        // Atempt login.
        if (! Auth::attempt($credentials)) {
            return $this->badCredentialsResponse();
        }

        // Assign user to variable from request.
        $user = $request->user();

        // Create token for created user.
        $userToken = $this->createTokenForUser($user);

        // Return response with token.
        return $this->sendSuccessAuthorizationResponse($userToken);
    }
}
