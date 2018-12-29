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
             AreaTableSeeder::class,
             WaroengTableSeeder::class,
             KategoriTableSeeder::class,
             KategoriDetailTableSeeder::class,
             KomplainTableSeeder::class,
             KomplainDetailTableSeeder::class
         ]);
    }
}
