<?php

use Illuminate\Database\Seeder;

use App\BookSuggest;

class BookSuggestsTableSeeder extends Seeder
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
            $book = new BookSuggest();
            $book->book_name = "Book Name 0".$i;
            $book->author_name = "Author Name 0".$i;
            $book->publisher_name = "Publisher Name 0".$i;
            $book->user_id = mt_rand(1, 10);
            $book->short_description = $faker->text;
            $book->save();
        }
    }
}
