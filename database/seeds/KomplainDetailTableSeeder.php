<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomplainDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komplain_detail')->insert([
            ["komplain_id"=>"4", "id_kategori"=>"1"],
            ["komplain_id"=>"5", "id_kategori"=>"3"],
            ["komplain_id"=>"5", "id_kategori"=>"4"],
            ["komplain_id"=>"6", "id_kategori"=>"4"],
            ["komplain_id"=>"6", "id_kategori"=>"5"],
        ]);
    }
}
