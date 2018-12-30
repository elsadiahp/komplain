<?php

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kategori::insert([
            [
                'kategori_nama'=>'Layanan Parkir',
            ],
            [
                'kategori_nama'=>'Kualitas Personal OP',
            ],
            [
                'kategori_nama'=>'Kualitas Area Konsumen',
            ],
            [
                'kategori_nama'=>'Kualitas Fasilitas Konsumen',
            ],
            [
                'kategori_nama'=>'Layanan Konsumen',
            ],
            [
                'kategori_nama'=>'Layanan Bungkus',
            ],
            [
                'kategori_nama'=>'Layanan Kasir',
            ],
            [
                'kategori_nama'=>'Layanan Produksi',
            ],
            ]);
        \App\Models\Kategori::insert([
            [
                'kategori_parent_id'=>1,
                'kategori_nama'=>'Sarpas Parkir',
            ],
            [
                'kategori_parent_id'=>1,
                'kategori_nama'=>'3K Parkir',
            ],
            [
                'kategori_parent_id'=>1,
                'kategori_nama'=>'Petugas Parkir',
            ],
            [
                'kategori_parent_id'=>1,
                'kategori_nama'=>'Tarif Parkir',
            ],
            [
                'kategori_parent_id'=>2,
                'kategori_nama'=>'Penampilan OP',
            ],
            [
                'kategori_parent_id'=>2,
                'kategori_nama'=>'Keramahan OP',
            ],
            [
                'kategori_parent_id'=>2,
                'kategori_nama'=>'Respon OP',
            ],
            [
                'kategori_parent_id'=>3,
                'kategori_nama'=>'3K Area Konsumen',
            ],
            [
                'kategori_parent_id'=>3,
                'kategori_nama'=>'Smoking/No Smoking Area',
            ],
            [
                'kategori_parent_id'=>3,
                'kategori_nama'=>'Suasana Ruangan',
            ],
            [
                'kategori_parent_id'=>3,
                'kategori_nama'=>'Kualitas Musik',
            ],
            [
                'kategori_parent_id'=>3,
                'kategori_nama'=>'Gangguan Binatang',
            ],
            [
                'kategori_parent_id'=>4,
                'kategori_nama'=>'Area Wastafel',
            ],
            [
                'kategori_parent_id'=>4,
                'kategori_nama'=>'Area Toilet',
            ],
            [
                'kategori_parent_id'=>4,
                'kategori_nama'=>'Area Wudhu & Mushola',
            ],
            [
                'kategori_parent_id'=>4,
                'kategori_nama'=>'Kualitas Sarpras',
            ],
            [
                'kategori_parent_id'=>4,
                'kategori_nama'=>'Laktasi',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Layanan Among Tamu',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Layanan Antrian',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Layanan Booking',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Pesan Antar',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Layanan Nota',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Salah Antar Menu',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Layanan Garansi Kecewa',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Menu Habis/Kosong',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Barang Tinggal/Hilang',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Kobokan Tidak Tersaji',
            ],
            [
                'kategori_parent_id'=>5,
                'kategori_nama'=>'Alat Saji Pelayanan',
            ],
            [
                'kategori_parent_id'=>6,
                'kategori_nama'=>'Bungkus Tidak Lengkap',
            ],
            [
                'kategori_parent_id'=>6,
                'kategori_nama'=>'Menu Bungkus Lama',
            ],
            [
                'kategori_parent_id'=>6,
                'kategori_nama'=>'Bungkus Tertinggal',
            ],
            [
                'kategori_parent_id'=>6,
                'kategori_nama'=>'Bungkus Tertukar',
            ],
            [
                'kategori_parent_id'=>7,
                'kategori_nama'=>'Penampilan Kasir',
            ],
            [
                'kategori_parent_id'=>7,
                'kategori_nama'=>'Keramahan Kasir',
            ],
            [
                'kategori_parent_id'=>7,
                'kategori_nama'=>'Respon Kasir',
            ],
            [
                'kategori_parent_id'=>7,
                'kategori_nama'=>'Transaksi Kasir',
            ],
            [
                'kategori_parent_id'=>7,
                'kategori_nama'=>'3K Area Kasir',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Menu Sambal',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Menu Lauk',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Menu Sayur',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Menu Minuman',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Menu Buah',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Menu Nasi',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Higienitas Menu',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Kualitas Alat Saji Produksi',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Pelayanan Lama',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Salah Bungkus Menu',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Menu Dingin',
            ],
            [
                'kategori_parent_id'=>8,
                'kategori_nama'=>'Porsi Menu Sedikit',
            ],
        ]);
    }
}
