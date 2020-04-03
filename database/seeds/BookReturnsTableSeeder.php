<?php

use Illuminate\Database\Seeder;

use App\BookReturn;

class BookReturnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i  < 10; $i++) { 
            $bookReturn = new BookReturn();
            $bookReturn->return_date = $faker->date($format = 'Y-m-d', $max = 'now');
            $bookReturn->book_id = mt_rand(1, 10);
            $bookReturn->user_id = mt_rand(1, 10);
            $bookReturn->save();
        }
    }
}
