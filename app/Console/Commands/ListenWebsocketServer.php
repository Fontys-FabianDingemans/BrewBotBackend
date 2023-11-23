<?php

namespace App\Console\Commands;

use App\Events\ReceivedBrewBotMessage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use WebSocket\Client;
use WebSocket\ConnectionException;

class ListenWebsocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wss:listen';

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
        $stopAt = Carbon::now()->addMinute();

        $url = config('broadcasting.connections.ws.host') . ":" .
            config('broadcasting.connections.ws.port') . "/" .
            config('broadcasting.connections.ws.path');

        $client = new Client($url);

        $this->info('Listening for messages...');
        while (true) {
            if (Carbon::now()->greaterThanOrEqualTo($stopAt)){
                $this->info('Timeout.');
                break;
            }

            try{
                $message = $client->receive();
                if ($message){
                    $json = json_decode($message, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        Log::error('Invalid JSON from websocket: ' . $message);
                        continue;
                    }
                    $event = new ReceivedBrewBotMessage($json);
                    event($event);
                }
            }catch (ConnectionException $e) {}
        }
        $client->close();

        $this->info('Listening stopped.');
    }
}
