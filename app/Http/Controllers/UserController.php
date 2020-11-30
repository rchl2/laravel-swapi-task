<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\User\UpdateUserEmail;
use App\Http\Controllers\Controller;
use App\Http\Responses\User\UserResponse;
use App\Http\Requests\User\UserUpdateEmailRequest;

final class UserController extends Controller
{
    use UserResponse;
    
    /**
     * Update e-mail request.
     *
     * @param UserUpdateEmailRequest $request
     *
     * @return void
     */
    public function updateEmail(UserUpdateEmailRequest $request)
    {
        // Dispatch job to create user with validated request data.
        $user = $this->dispatchNow(new UpdateUserEmail($request->user(), $request->email));

        // Return response.
        return $this->userEmailUpdatedResponse();
    }
}