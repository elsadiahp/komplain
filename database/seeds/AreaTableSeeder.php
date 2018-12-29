<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert([
            ["area_id"=>1,"area_nama"=>"Pusat"],
            ["area_id"=>2,"area_nama"=>"Area Jabotabek"],
            ["area_id"=>4,"area_nama"=>"Area Bandung Raya"],
            ["area_id"=>5,"area_nama"=>"Area Purwokerto Raya"],
            ["area_id"=>6,"area_nama"=>"Area Semarang Raya"],
            ["area_id"=>7,"area_nama"=>"Area Yogyakarta Raya"],
            ["area_id"=>8,"area_nama"=>"Area Perintis"],
            ["area_id"=>9,"area_nama"=>"Area Solo Raya"],
            ["area_id"=>10,"area_nama"=>"Area Malang Raya"],
            ["area_id"=>11,"area_nama"=>"Area Surabaya Raya"],
            ["area_id"=>12,"area_nama"=>"Area Bali Raya"],
        ]);
    }
}
