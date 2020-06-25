<?php

use Illuminate\Database\Seeder;
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
        for ($i = 1; $i <= 5; $i++)
        {
            User::create([
                'name' => "user_{$i}",
                'email' => "user{$i}@gmail.com",
                'password' => Hash::make("password{$i}")
            ]);
        }
    }
}
