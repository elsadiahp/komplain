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
            ["komplain_detail_id"=>"1", "komplain_id"=>"4", "kategori_detail_id"=>"1"],
            ["komplain_detail_id"=>"4", "komplain_id"=>"5", "kategori_detail_id"=>"3"],
            ["komplain_detail_id"=>"5", "komplain_id"=>"5", "kategori_detail_id"=>"4"],
            ["komplain_detail_id"=>"6", "komplain_id"=>"6", "kategori_detail_id"=>"4"],
            ["komplain_detail_id"=>"7", "komplain_id"=>"6", "kategori_detail_id"=>"5"],
        ]);
    }
}
