<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	[
        		'name' => 'role-list',
        		'display_name' => 'Lihat Hak Akses',
        		'description' => 'Hanya melihat hak akses'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Tambah Hak Akses',
        		'description' => 'Tambah Hak Akses Baru'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Hak Akses',
        		'description' => 'Edit Hak Akses'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Hapus Hak Akses',
        		'description' => 'Hapus Hak Akses'
        	],
        	[
        		'name' => 'item-list',
        		'display_name' => 'Menampilkan Item',
        		'description' => 'Hanya dapat menampilka item'
        	],
        	[
        		'name' => 'item-create',
        		'display_name' => 'Menambah Item',
        		'description' => 'Menambah item baru'
        	],
        	[
        		'name' => 'item-edit',
        		'display_name' => 'Edit Item',
        		'description' => 'Edit item'
        	],
        	[
        		'name' => 'item-delete',
        		'display_name' => 'Hapus Item',
        		'description' => 'Hapus Item'
        	]
		]);
    }
}
