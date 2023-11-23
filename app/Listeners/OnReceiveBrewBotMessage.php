<?php

namespace App\Listeners;

use App\Events\ReceivedBrewBotMessage;
use App\Models\User;
use App\Models\UserBeerConsumption;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnReceiveBrewBotMessage
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
    public function handle(ReceivedBrewBotMessage $event): void
    {
        $json = $event->data;

        $to = $json['to'];
        $action = $json['action'];
        $type = $json['type'];
        $user_id = $json['user_id'];

        if($to === "server" && $action === "completed"){
            $user = User::query()->where('id', $user_id)->first();
            if(!$user){
                \Log::debug('User not found for user_id: ' . $user_id);
                return;
            }

            $userBeerConsumption = new UserBeerConsumption();
            $userBeerConsumption->user_id = $user_id;
            $userBeerConsumption->type = $type;
            $userBeerConsumption->location = "school";
            $userBeerConsumption->save();

            \Log::debug('Tab Completed for user_id: ' . $user_id);
        }
    }
}
