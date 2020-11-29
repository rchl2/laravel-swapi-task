<?php

namespace App\Services\User;

use App\Models\User;

trait UserService
{
    /**
     * Create token for user.
     *
     * @param User $user
     *
     * @return void
     */
    protected function createTokenForUser(User $user)
    {
        return $user->createToken('authToken')->plainTextToken;
    }
}