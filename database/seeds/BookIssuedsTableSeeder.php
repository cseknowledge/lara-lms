<?php

use Illuminate\Database\Seeder;

use App\BookIssued;

class BookIssuedsTableSeeder extends Seeder
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
            $issue_date = $faker->date($format = 'Y-m-d', $max = 'now');
            $return_date = date('Y-m-d', strtotime($issue_date. ' + '.rand (3, 15).' days'));
            $bookIssued = new BookIssued();
            $bookIssued->issue_date = $issue_date;
            $bookIssued->return_date = $return_date;
            $bookIssued->quantity = mt_rand(1, 10);
            $bookIssued->book_id = mt_rand(1, 10);
            $bookIssued->user_id = mt_rand(1, 10);
            $bookIssued->save();
        }
    }
}
