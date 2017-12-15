<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Workshop;
use App\Agendas;
class WorkshopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Workshop::truncate();
        Agendas::truncate();

        foreach (range(1, 10) as $i) {
        $workshop =   Workshop::create([
            'id'=>null,
            'event_name'=> $faker->catchPhrase,
            'theme'=> $faker->bs,
            'goal'=> $faker->sentence,
            'audience' => $faker->jobTitle,
            'number'=> mt_rand(1, 12) ,
            'location' => $faker->streetName ,
            'user_id' => $i,
            'when' => date($format = 'Y-m-d'),
            'time' => time($format = 'H:i:s', $max = 'now')
          ]);
        };

        foreach (range(1, mt_rand(3, 12)) as $j) {
          Agendas::create([
            'workshop_id' => $workshop -> id,
            'agenda_name' => $faker->catchPhrase,
            'agenda_time' => time($format = 'H:i:s', $max = 'now'),
            'agenda_duration' => mt_rand(15, 60)
          ]);
        }
    }
}
