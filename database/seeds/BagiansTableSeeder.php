<?php

use Illuminate\Database\Seeder;

class BagiansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bagian::insert([
           [
               'bagian_nama'=>'Pelayanan'
           ],
           [
               'bagian_nama'=>'Produksi'
           ],
           [
               'bagian_nama'=>'Kasir'
           ],
        ]);
    }
}
