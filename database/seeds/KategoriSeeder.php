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
        	'id' => '1',
        	'kendaraan' => 'Mobil',
        ],
		[
			'id' => '2',
        	'kendaraan' => 'Motor',
		]
		]);
    }
}
