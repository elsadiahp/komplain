<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaroengTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waroeng')->insert([
            ["waroeng_id"=>"1", "waroeng_nama"=>"SS Gading Serpong", "waroeng_alamat"=>"Jabotabek", "area_id"=>"2"],
            ["waroeng_id"=>"2", "waroeng_nama"=>"SS Bali", "waroeng_alamat"=>"Bali", "area_id"=>"12"],
            ["waroeng_id"=>"3", "waroeng_nama"=>"SS Bali Hore", "waroeng_alamat"=>"Bali H", "area_id"=>"12"],
            ["waroeng_id"=>"4", "waroeng_nama"=>"SS Jakal", "waroeng_alamat"=>"Jl Kaliurang", "area_id"=>"7"],
            ["waroeng_id"=>"7", "waroeng_nama"=>"SS Besi", "waroeng_alamat"=>"Jl Besi", "area_id"=>"7"],
            ["waroeng_id"=>"8", "waroeng_nama"=>"SS Babarsari", "waroeng_alamat"=>"Jl Babarsari", "area_id"=>"7"],
            ["waroeng_id"=>"9", "waroeng_nama"=>"SS Ringroad", "waroeng_alamat"=>"Jl Ring Road Utara", "area_id"=>"7"],
            ["waroeng_id"=>"10", "waroeng_nama"=>"SS Prambanan", "waroeng_alamat"=>"Jl Jogja Solo", "area_id"=>"8"],
            ["waroeng_id"=>"11", "waroeng_nama"=>"SS Palagan", "waroeng_alamat"=>"Jl Palagan", "area_id"=>"8"],
        ]);
    }
}
