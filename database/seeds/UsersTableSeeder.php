<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // User::truncate();

        foreach (range(1, 10) as $i) {
          user::create([
            'username' => $faker->userName,
            'email' => $faker->unique()->safeEmail,
            'fname'=> $faker->firstName,
            'lname'=> $faker->lastName,
            'password'=>bcrypt('password')
          ]);
        }
    }
}
