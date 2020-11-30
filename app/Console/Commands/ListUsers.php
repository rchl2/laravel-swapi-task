<?php

namespace App\Console\Commands;

use App\Queries\UserQueries;
use Illuminate\Console\Command;

final class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists registered users.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all users.
        $users = UserQueries::getAllWithHero();

        // Return table.
        return $this->table(['email', 'hero'], $users);
    }
}
