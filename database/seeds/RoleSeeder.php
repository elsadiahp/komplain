<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin',
            'display_name' => 'Administrator',
            ],
            ['name' => 'direktur',
            'display_name' => 'Lembaga Direktur',
            ],
            ['name' => 'opp',
            'display_name' => 'Operasional Pelayanan dan Penjualan',
            ],
            ['name' => 'manager-area',
            'display_name' => 'Manager Area',
            ],
            ['name' => 'kacap',
            'display_name' => 'Kepala Cabang',
            ]
        ]);
    }
}
