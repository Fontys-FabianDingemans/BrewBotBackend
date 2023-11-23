<?php

namespace Database\Seeders;

use App\enums\Beer;
use App\Models\User;
use App\Models\UserBeerConsumption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ConsumptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->where('username', 'Jane Doe')->firstOrFail();

        $consumptions_count = 2000;
        for ($i = 0; $i < $consumptions_count; $i++) {
            /** @var UserBeerConsumption $consumption */
            $consumption = $user->beerConsumptions()->make([
                'type' => Beer::random(),
                'location' => 'Home',
                'created_at' => Carbon::now()->subDays(rand(0, 180)),
            ]);
            $consumption->save();
        }
    }
}
