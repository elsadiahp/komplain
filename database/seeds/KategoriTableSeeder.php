<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kategori')->insert([
            ["id_kategori"=>"1","bagian_id"=>1, "nama_kategori"=>"Layanan Parkir"],
            ["id_kategori"=>"2","bagian_id"=>1, "nama_kategori"=>"Kualitas Personil OP"],
            ["id_kategori"=>"3","bagian_id"=>1, "nama_kategori"=>"Kualitas Area Konsumen"],
            ["id_kategori"=>"4","bagian_id"=>1, "nama_kategori"=>"Layanan Bungkus"],
            ["id_kategori"=>"5","bagian_id"=>1, "nama_kategori"=>"Layanan Kasir"],
            ["id_kategori"=>"6","bagian_id"=>1, "nama_kategori"=>"Layanan Konsumen"],
        ]);
    }
}