<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Setting Aplikasi
    	$name = 'Aplikasi';
    	DB::table('settings')->insert([
    		'name' 		=> $name,
    		'slug' 		=> Str::slug($name, '-'),
    		'position' 	=> 1
    	]);

        DB::table('setting_values')->insert([
        	'setting_id' 	=> 1,
        	'code' 			=> 'app.name',
        	'name' 			=> 'Nama Aplikasi',
        	'value' 		=> 'Laravel',
        	'position' 		=> 1
        ]);

        // Setting Style
    	$name = 'Style';
    	DB::table('settings')->insert([
    		'name' 		=> $name,
    		'slug' 		=> Str::slug($name, '-'),
    		'position' 	=> 2
    	]);

        DB::table('setting_values')->insert([
        	'setting_id' 	=> 2,
        	'code' 			=> 'style.small_class',
        	'name' 			=> 'Small container class',
        	'value' 		=> 'col-12 col-lg-8',
        	'position' 		=> 1
        ]);

        DB::table('setting_values')->insert([
        	'setting_id' 	=> 2,
        	'code' 			=> 'style.medium_class',
        	'name' 			=> 'Medium container class',
        	'value' 		=> 'col-12 col-lg-10',
        	'position' 		=> 2
        ]);

        DB::table('setting_values')->insert([
        	'setting_id' 	=> 2,
        	'code' 			=> 'style.large_class',
        	'name' 			=> 'Large container class',
        	'value' 		=> 'col-12 col-lg-12',
        	'position' 		=> 3
        ]);
    }
}
