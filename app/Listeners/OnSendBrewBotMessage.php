<?php

namespace App\Listeners;

use App\Events\SendBrewBotMessage;
use Illuminate\Support\Facades\Log;
use WebSocket\Client;

class OnSendBrewBotMessage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendBrewBotMessage $event): void
    {
        $url = config('broadcasting.connections.ws.host') . ":" .
            config('broadcasting.connections.ws.port') . "/" .
            config('broadcasting.connections.ws.path');

        Log::debug("Sending message to $url");
        try{
            $client = new Client($url);

            $json_data = json_encode(array_merge($event->data, [
                'headers' => [
                    "x-auth-token" => config('broadcasting.connections.ws.token'),
                ],
            ]));
            $client->send($json_data);

            $response = $client->receive();
            $response_data = json_decode($response, true);
            if($response_data['success'] === false){
                Log::debug("ERROR: Could not send message to $url");
                Log::debug($response_data['message']);
            }
            Log::debug("Message sent to $url");
            $client->close();
        }catch(\Exception $e){
            Log::debug("ERROR: Could not send message to $url");
            Log::debug($e->getMessage());
        }
    }
}
