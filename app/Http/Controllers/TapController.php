<?php

namespace App\Http\Controllers;

use App\enums\Beer;
use App\Events\SendBrewBotMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TapController extends Controller
{

    /**
     * @operationId Tap Scanned
     *
     * Tap Scanned
     *
     * Send the id of the scanned tap here.
     * This will update the user profile.
     */
    public function scan(Request $request)
    {
        $request->validate([
            'tab_id' => 'required|string',
        ]);
        $data = $request->only(['tab_id']);

        /** @var User $user */
        $user = $request->get('user');

        $user->update([
            'tab_id' => $data['tab_id'],
        ]);

        return response()->json([
            "message" => "Tab scanned successfully",
        ]);
    }

    /**
     * @operationId Activate Beer
     *
     * Activate Beer
     *
     * This will activate the tap and make a beer.
     */
    public function activate(Request $request)
    {
        $request->validate([
            'type' => ['required', Rule::enum(Beer::class)],
            'location' => 'required|string',
        ]);
        $data = $request->only(['type', 'location']);

        $event = new SendBrewBotMessage([
            'action' => 'activate',
            'type' => $data['type'],
            'to' => "brewbot_machine_1",
            'user_id' => $request->get('user')->id,
        ]);
        event($event);

        return response()->json([
            "message" => "Tap activated successfully",
        ]);
    }

}
