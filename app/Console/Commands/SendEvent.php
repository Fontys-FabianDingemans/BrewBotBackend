<?php

namespace App\Console\Commands;

use App\enums\Beer;
use App\Events\SendBrewBotMessage;
use Illuminate\Console\Command;

class SendEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wss:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $event = new SendBrewBotMessage([
            'action' => 'activate',
            'type' => Beer::SPECIAL->value,
            'to' => 'brewbot_machine_1',
            "user_id" => 1,
        ]);
        event($event);
    }
}
