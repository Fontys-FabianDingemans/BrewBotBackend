<?php

namespace Database\Seeders;

use App\enums\Gender;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->username = 'Jane Doe ';
        $user->email = 'jane.doe@gmail.com';
        $user->password = 'jane.doe';
        $user->age = 18;
        $user->gender = Gender::MALE;
        $user->api_token = 'jane.doe';
        $user->save();
    }
}
