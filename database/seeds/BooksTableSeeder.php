<?php

use Illuminate\Database\Seeder;

use App\Book;

class BooksTableSeeder extends Seeder
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
            $book = new Book();
            $book->generated_book_id = $faker->bankAccountNumber;
            $book->book_name = $faker->title;
            $book->short_description = $faker->text;
            $book->author_id = mt_rand(1, 10);
            $book->publisher_id = mt_rand(1, 10);
            $book->price = $faker->randomNumber(3);
            $book->is_available = $faker->boolean;
            $book->save();
        }
    }
}
