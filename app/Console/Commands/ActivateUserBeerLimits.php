<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ActivateUserBeerLimits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:activate-user-beer-limits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all users and activate the new beer limits if the activation date has passed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::query()
            ->whereNotNull('new_beer_limit')
            ->whereNotNull('new_beer_limit_activate')
            ->where('new_beer_limit_activate', '<=', now())
            ->get();
        if($users->isEmpty()) {
            $this->warn('No users to activate.');
            return;
        }

        foreach ($users as $user) {
            $user->activateNewBeerLimit();
            $this->info("Activated new beer limit for user {$user->id}.");
        }
    }
}
