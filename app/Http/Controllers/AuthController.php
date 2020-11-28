<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\User\CreateUser;
use App\Services\User\UserService;
use App\Http\Responses\User\UserResponse;
use App\Http\Requests\UserRegisterRequest;

final class AuthController extends Controller
{
    use UserService, UserResponse;
    
    /**
     * Register user.
     *
     * @param \App\Http\Requests\UserRegisterRequest $request
     *
     * @return void
     */
    public function register(UserRegisterRequest $request)
    {
        // Dispatch job to create user with validated request data.
        return $user = $this->dispatchNow(new CreateUser($request->validated()));
    }

    /**
     * Login user.
     *
     * @param UserLoginRequest $request
     *
     * @return void
     */
    public function login(UserLoginRequest $request)
    {

    }
}
