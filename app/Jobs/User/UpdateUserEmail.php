<?php

namespace App\Jobs\User;

use App\Models\User;

final class UpdateUserEmail
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private User $user, private string $email) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->user->update([
            'email' => $this->email,
        ]);
    }
}