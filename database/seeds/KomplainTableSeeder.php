<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KomplainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komplain')->insert([
            ["komplain_id"=>"1", "waroeng_id"=>"3", "media_koplain"=>"lisan", "isi_komplain"=>"j", "tanggal_komplain"=>"2018-12-11", "waktu_komplain"=>"02:56:00"],
            ["komplain_id"=>"2", "waroeng_id"=>"3", "media_koplain"=>"lisan", "isi_komplain"=>"j", "tanggal_komplain"=>"2018-12-11", "waktu_komplain"=>"02:56:00"],
            ["komplain_id"=>"3", "waroeng_id"=>"3", "media_koplain"=>"lisan", "isi_komplain"=>"j", "tanggal_komplain"=>"2018-12-11", "waktu_komplain"=>"02:56:00"],
            ["komplain_id"=>"4", "waroeng_id"=>"3", "media_koplain"=>"lisan", "isi_komplain"=>"j", "tanggal_komplain"=>"2018-12-11", "waktu_komplain"=>"02:56:00"],
            ["komplain_id"=>"5", "waroeng_id"=>"8", "media_koplain"=>"lisan", "isi_komplain"=>"te", "tanggal_komplain"=>"2018-12-11", "waktu_komplain"=>"03:13:00"],
            ["komplain_id"=>"6", "waroeng_id"=>"4", "media_koplain"=>"lisan", "isi_komplain"=>"yes", "tanggal_komplain"=>"2018-12-12", "waktu_komplain"=>"03:14:00"],
        ]);
    }
}
