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
            'password' => Hash::make('12345678'),
            'address' => 'admin Address',
            'member_type' => "Staff",
            'expiry_date' => date('Y-m-d', strtotime(date('Y-m-d')))

        ]);

        for($i = 1; $i < 10; $i++) {
            $user = new User();
            $user->member_id = $faker->bankAccountNumber;
            $user->name = $faker->name;
            $user->email = 'user_'.$i.'@test.com';
            $user->password = Hash::make('12345678');
            $user->address = $faker->address;
            $user->member_type = ($i % 2) == 0 ? "Staff" : "Member";
            $user->expiry_date = date('Y-m-d', strtotime(date('Y-m-d')));
            $user->save();
        }
    }
}
