<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
		[
        	'id_kategori' => '1',
        	'kendaraan' => 'Mobil',
        ],
		[
			'id_kategori' => '2',
        	'kendaraan' => 'Motor',
		]
		
		]);
    }
}
