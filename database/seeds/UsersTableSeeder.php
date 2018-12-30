<?php

use Illuminate\Database\Seeder;
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
        \App\User::insert([
            [
                'name' =>'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' =>'user',
                'email' => 'user@email.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}