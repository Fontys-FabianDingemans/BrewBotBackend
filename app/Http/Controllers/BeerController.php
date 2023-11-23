<?php

namespace App\Http\Controllers;

use App\enums\Beer;
use App\Models\User;
use App\Models\UserBeerConsumption;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class BeerController extends Controller
{

    /**
     * @operationId Add Beer
     *
     * Add Beer
     *
     * Add a beer to the user's consumption list
     */
    public function create(Request $request){
        $request->validate([
            'type' => ['required', Rule::enum(Beer::class)],
            'location' => ['required', 'string']
        ]);
        $data = $request->only('type', 'location');

        /** @var User $user */
        $user = $request->get('user');

        /** @var UserBeerConsumption $beer */
        $beer = $user->beerConsumptions()->make();
        $beer->type = $data['type'];
        $beer->location = $data['location'];
        $beer->save();

        return response()
            ->json([
                'message' => 'Beer added successfully'
            ]);
    }

    /**
     * @operationId Get Latest Beer
     * @response array{beer: UserBeerConsumption}
     *
     * Get Last Beer
     *
     * Get the latest beer consumed by the user
     */
    public function getLast(Request $request)
    {
        /** @var User $user */
        $user = $request->get('user');

        $beer = $user->beerConsumptions()->orderBy('created_at', 'desc')->first();
        if($beer){
            return response()
                ->json([
                    'beer' => $beer
                ]);
        }

        return response()
            ->json([
                'message' => 'No beer found'
            ], 404);
    }


    /**
     * @operationId Get Consumptions
     * @response array{ beers: array{ date_time: array{ type1: int, type2: int, type3: int } }[] }
     *
     * Get Consumptions
     *
     * Get beer count per type for the last x days
     */
    public function getConsumptions(Request $request)
    {
        $request->validate([
            'days' => ['integer', 'min:1', 'max:30']
        ]);

        /** @var User $user */
        $user = $request->get('user');

        $days = $request->has('days') ? intval($request->get('days')) : 7;

        $beers = $user->beerConsumptions()
            ->orderBy('created_at', 'desc')
            ->where('created_at', '>=', now()->subDays($days))
            ->get();

        $day_list = [];
        for ($i = 0; $i < $days; $i++) {
            $day_string = now()->subDays($i)->format('d-m-Y');
            $beers_of_today = $beers->filter(function ($beer) use ($day_string) {
                return Carbon::parse($beer->created_at)->format('d-m-Y') == $day_string;
            });

            $day_list[$day_string] = [
                Beer::NORMAL->value => $beers_of_today->filter(function ($beer) use ($day_string) {
                    return $beer->type == Beer::NORMAL;
                })->count(),
                Beer::ZERO->value => $beers_of_today->filter(function ($beer) use ($day_string) {
                    return $beer->type == Beer::ZERO;
                })->count(),
                Beer::SPECIAL->value => $beers_of_today->filter(function ($beer) use ($day_string) {
                    return $beer->type == Beer::SPECIAL;
                })->count(),
            ];
        }

        return response()
            ->json([
                'showing_days' => $days,
                'consumptions' => $day_list
            ]);
    }

}
