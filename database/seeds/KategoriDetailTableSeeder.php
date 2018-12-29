<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_detail')->insert([
            ["kategori_detail_id"=>"1","kategori_detail_nama"=>"Sarpras Parkir", "id_kategori"=>"1"],
            ["kategori_detail_id"=>"2","kategori_detail_nama"=>"3K Parkir", "id_kategori"=>"1"],
            ["kategori_detail_id"=>"3","kategori_detail_nama"=>"Penampilan OP", "id_kategori"=>"2"],
            ["kategori_detail_id"=>"4","kategori_detail_nama"=>"Keramahan OP", "id_kategori"=>"2"],
            ["kategori_detail_id"=>"5","kategori_detail_nama"=>"3K Area Konsumen", "id_kategori"=>"3"],
            ["kategori_detail_id"=>"6","kategori_detail_nama"=>"Smoking/ No Smoking Area", "id_kategori"=>"3"],
            ["kategori_detail_id"=>"7","kategori_detail_nama"=>"Menu Bungkus Lama", "id_kategori"=>"4"],
            ["kategori_detail_id"=>"8","kategori_detail_nama"=>"Bungkus Tidak Lengkap", "id_kategori"=>"4"],
            ["kategori_detail_id"=>"9","kategori_detail_nama"=>"Keramahan Kasir", "id_kategori"=>"5"],
            ["kategori_detail_id"=>"10","kategori_detail_nama"=>"Penampilan Kasir", "id_kategori"=>"5"],
            ["kategori_detail_id"=>"11","kategori_detail_nama"=>"Kualitas Menu Lauk", "id_kategori"=>"6"],
            ["kategori_detail_id"=>"1s","kategori_detail_nama"=>"Kualitas Menu Sambal", "id_kategori"=>"6"],
        ]);
    }
}
