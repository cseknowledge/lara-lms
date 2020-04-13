<?php

use Illuminate\Database\Seeder;

use App\Models\BookReturn;

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

        $return_problem = array('Damage', 'Lost', 'Date Expired');

        for ($i = 0; $i  < 10; $i++) { 
            $bookReturn = new BookReturn();
            $random_return_problem = array_rand($return_problem, 1);
            $bookReturn->return_date = $faker->date($format = 'Y-m-d', $max = 'now');
            $bookReturn->book_id = mt_rand(1, 10);
            $bookReturn->user_id = mt_rand(1, 10);
            $bookReturn->quantity = mt_rand(1, 10);
            $bookReturn->return_problem = $return_problem[$random_return_problem];
            $bookReturn->short_description = $faker->text;
            $bookReturn->save();
        }
    }
}
