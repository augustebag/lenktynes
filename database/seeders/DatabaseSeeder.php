<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Auguste',
            'email' => 'abagdzeviciute@gmail.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ona',
            'email' => 'ona@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $name = ['Alex', 'Sara', 'Bette', 'Sugar', 'Blue', 'Cody', 'Magic'];
        foreach(range(1, 100) as $_) {

            DB::table('horses')->insert([
                'name' => $name[rand(0, count($name) -1)], 
                'runs' => rand(10, 50),
                'photo' => rand(0, 2) ? $faker->imageUrl(200, 300) : null,
                'wins' => rand(1, 20),
                'about' => $faker->realText(300, 5),
            ]);
        }

        $name = ['Alex', 'Sara', 'Bette', 'Sugar', 'Blue', 'Cody', 'Magic'];
        foreach(range(1, 100) as $_) {

            DB::table('betters')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'bet' => rand(1, 100000),
                'horse_id' => rand(1, 20), 
            ]);
        }
    }
}
