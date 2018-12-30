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
         $this->call([
             UsersTableSeeder::class,
             BagiansTableSeeder::class,
             KategorisTableSeeder::class,
             AreasTableSeeder::class,
             WaroengsTableSeeder::class,
             MediasTableSeeder::class,
             KomplainsTableSeeder::class,
             KomplainDetailsTableSeeder::class,
         ]);
    }
}
