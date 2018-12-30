<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Area::insert([
            ['area_nama' => 'Pusat'],
            ['area_nama' => 'Area Jabodetabek'],
            ['area_nama' => 'Area Tangerang'],
            ['area_nama' => 'Area Purwokerto'],
            ['area_nama' => 'Area Semarang Raya'],
            ['area_nama' => 'Area Yogyakarta Raya'],
            ['area_nama' => 'Area Perintis'],
            ['area_nama' => 'Area Solo Raya'],
            ['area_nama' => 'Area Malang Raya'],
            ['area_nama' => 'Area Surabaya Raya'],
            ['area_nama' => 'Area Bali Raya'],
        ]);
    }
}
