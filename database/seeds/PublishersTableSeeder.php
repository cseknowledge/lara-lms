<?php

use Illuminate\Database\Seeder;

use App\Models\Publisher;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $publisher = new Publisher();
            $publisher->publisher_name = $faker->company;
            $publisher->publisher_owner_name = $faker->name;
            $publisher->address = $faker->address;
            $publisher->short_description = $faker->sentence;
            $publisher->save();
        }
    }
}
