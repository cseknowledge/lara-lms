<?php

use Illuminate\Database\Seeder;

use App\BookReview;

class BookReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) { 
            $bookReview = new BookReview();
            $bookReview->book_id = mt_rand(1, 10);
            $bookReview->user_id = mt_rand(1, 10);
            $bookReview->book_review = $faker->paragraph;
            $bookReview->save();
        }
    }
}
