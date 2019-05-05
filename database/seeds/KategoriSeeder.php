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
        	'kategori_id' => '1',
        	'kendaraan' => 'Mobil',
        ],
		[
			'kategori_id' => '2',
        	'kendaraan' => 'Motor',
		]
		]);
    }
}
