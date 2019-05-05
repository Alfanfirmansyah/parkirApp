<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
		[
        	'name' => 'Administrator',
        	'email' => 'admin@gmail.com',
        	'email_verified_at' => '2019-03-24 15:54:07',
        	'password' => Hash::make('password'),
        	'foto' => 'icon.jpg',
        	'address' => 'Jl.Ngamarto Lawang',
        	'telp' => '080000000',
        	'role_id' => '1',
        	'customer_id' => '0'
        ],
		[
        	'name' => 'Operator',
        	'email' => 'operator@gmail.com',
        	'email_verified_at' => '2019-03-24 15:54:07',
        	'password' => Hash::make('password'),
        	'foto' => 'icon.jpg',
        	'address' => 'Mlg',
        	'telp' => '080000000',
        	'role_id' => '2',
        	'customer_id' => '1'
        ]
		
		]);
    }
}
