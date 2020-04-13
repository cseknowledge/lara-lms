<?php

use Illuminate\Database\Seeder;

use App\Models\Author;

class AuthorsTableSeeder extends Seeder
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
            $author = new Author();
            $author->author_name = $faker->name;
            $author->short_description = $faker->sentence;
            $author->save();
        }
    }
}
