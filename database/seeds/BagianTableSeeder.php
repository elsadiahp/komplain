<?php

use Illuminate\Database\Seeder;

class BagianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bagian')->insert([
            ["bagian_nama"=>"Pelayanan"],
            ["bagian_nama"=>"Produksi"],
            ["bagian_nama"=>"Kasir"],
        ]);
    }
}
