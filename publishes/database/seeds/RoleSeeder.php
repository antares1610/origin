<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Roles seeder
        DB::table('roles')->insert([
        	'name' => 'Developer'
        ]);

        DB::table('roles')->insert([
        	'name' => 'Administrator'
        ]);

        DB::table('roles')->insert([
        	'name' => 'User'
        ]);

        // Access Groups seeder
        DB::table('access_groups')->insert([
        	['name' => 'Common Actions'], // ID 1
        	['name' => 'Roles'], // ID 2
        ]);

        // Accesses seeder
        DB::table('accesses')->insert([
        	[
        		'access_group_id' 	=> 1,
        		'name' 				=> 'Panel Admin',
        		'code' 				=> 'admin'
        	],
        	[
	        	'access_group_id' 	=> 2,
	        	'name' 				=> 'Roles Index',
	        	'code' 				=> 'roles.index'
        	],
        	[
	        	'access_group_id' 	=> 2,
	        	'name' 				=> 'Buat Role',
	        	'code' 				=> 'roles.create'
        	],
        	[
	        	'access_group_id' 	=> 2,
	        	'name' 				=> 'Edit Role',
	        	'code' 				=> 'roles.edit'
        	],
        	[
	        	'access_group_id' 	=> 2,
	        	'name' 				=> 'Hapus Role',
	        	'code' 				=> 'roles.destroy'
        	],
        	[
	        	'access_group_id' 	=> 2,
	        	'name' 				=> 'Edit Hak Akses Role',
	        	'code' 				=> 'roles.accesses'
        	],
        ]);

        // Role accesses
        DB::table('role_accesses')->insert([
        	[
        		'role_id'	=> 1,
        		'code'		=> 'admin'
        	],
        	[
        		'role_id'	=> 1,
        		'code'		=> 'roles.index'
        	],
        	[
        		'role_id'	=> 1,
        		'code'		=> 'roles.create'
        	],
        	[
        		'role_id'	=> 1,
        		'code'		=> 'roles.edit'
        	],
        	[
        		'role_id'	=> 1,
        		'code'		=> 'roles.destroy'
        	],
        	[
        		'role_id'	=> 1,
        		'code'		=> 'roles.accesses'
        	],
        ]);
    }
}
