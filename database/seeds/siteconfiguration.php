<?php

use Illuminate\Database\Seeder;

class siteconfiguration extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siteconfiguration')->insert([
    			['website_name' => 'Laravel','website_title'=>'A laravel Site','logo'=>'logo.png'],
    			
    	]);
    }
}
