<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert(
            [
                'name' => $faker->name,
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'date_of_birth' => '2000-10-10',
                'password' => Hash::make('123456'),
                'gender' => '1',
                'number_phone' => '08063835187',
                'address' => $faker->address,
                'role' => '1',

            ]
            );
    }
}
