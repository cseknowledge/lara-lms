<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(PublishersTableSeeder::class);
        // $this->call(AuthorsTableSeeder::class);
        // $this->call(BooksTableSeeder::class);
        // $this->call(BookIssuedsTableSeeder::class);
        // $this->call(BookReturnsTableSeeder::class);
        // $this->call(BookReviewsTableSeeder::class);
        // $this->call(BookSuggestsTableSeeder::class);
    }
}
