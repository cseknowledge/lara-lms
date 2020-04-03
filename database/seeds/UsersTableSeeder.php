<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        App\User::Create([
            'name' => 'Md. Arif Dewan',
            'email' => 'arif.dewan@oscillosoft.com.au',
            'password' => Hash::make('12345678')
        ]);

        for($i = 1; $i < 10; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = 'user_'.$i.'@test.com';
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
