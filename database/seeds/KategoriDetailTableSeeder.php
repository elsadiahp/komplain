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
        DB::table('tb_kategori')->insert([
            ["nama_kategori"=>"Sarpras Parkir", "id_kategori_parent"=>"1"],
            ["nama_kategori"=>"3K Parkir", "id_kategori_parent"=>"1"],
            ["nama_kategori"=>"Penampilan OP", "id_kategori_parent"=>"2"],
            ["nama_kategori"=>"Keramahan OP", "id_kategori_parent"=>"2"],
            ["nama_kategori"=>"3K Area Konsumen", "id_kategori_parent"=>"3"],
            ["nama_kategori"=>"Smoking/ No Smoking Area", "id_kategori_parent"=>"3"],
            ["nama_kategori"=>"Menu Bungkus Lama", "id_kategori_parent"=>"4"],
            ["nama_kategori"=>"Bungkus Tidak Lengkap", "id_kategori_parent"=>"4"],
            ["nama_kategori"=>"Keramahan Kasir", "id_kategori_parent"=>"5"],
            ["nama_kategori"=>"Penampilan Kasir", "id_kategori_parent"=>"5"],
            ["nama_kategori"=>"Kualitas Menu Lauk", "id_kategori_parent"=>"6"],
            ["nama_kategori"=>"Kualitas Menu Sambal", "id_kategori_parent"=>"6"],
        ]);
    }
}
