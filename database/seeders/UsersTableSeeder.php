<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Demo1',
                'lname' => 'Admin1',
                'profile_pic' => 'user_profile/LGaSsMobbrtkOriYzswycVlLThHR8jPsfe40xIKj.jpg',
                'email' => 'demoadmin@gmail.com',
                'phone' => '8098080881',
                'facebook_id' => null,
                'google_id' => null,
                'email_verified_at' => '2024-07-19 18:00:15',
                'password' => '$2y$10$XzEzkVcvhj3dQgSASOyC/uRT.qp6nNEEGD6umGqsXjf1529w/4IzO', // Change 'password' to the actual password or hashed password
                // 'password' => Hash::make('password'), // Change 'password' to the actual password or hashed password
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
                'remember_token' => null,
                'type' => 'admin',
                'role' => 'admin',
                'created_at' => null,
                'updated_at' => '2024-07-24 16:56:59',
            ],
        ]);
    }
}
