<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','admin@gmail.com')->first();
        if(!$user)
        {
            User::create([
                'name' => "Rafsan Jany Chowdhury",
                'email' => "admin@foodopie.com",
                'password' => Hash::make(1234),
                'location' => 'Mirpur',
                'status' => 'Admin',
                'phone' => '01744889040',

            ]);
        }
    }
}
