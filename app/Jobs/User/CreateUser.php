<?php

namespace App\Jobs\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class CreateUser
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private array $requestData) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return User::create([
            'email' => $this->requestData['email'],
            'password' => Hash::make($this->requestData['password']),
        ]);
    }
}
