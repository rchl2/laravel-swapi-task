<?php

namespace App\Queries;

use App\Models\User;

final class UserQueries
{
    /**
     * Get all users with hero.
     *
     * @return array
     */
    public static function getAllWithHero(): array
    {
        return User::all(['email', 'hero_id'])
            ->toArray();
    }
}