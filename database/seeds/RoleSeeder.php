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
		[
        	'id' => '1',
        	'role' => 'Admin',
        ],
		[
			'id' => '2',
        	'role' => 'Operator',
		]
		
		]);
    }
}
