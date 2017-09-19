<?php

use Illuminate\Database\Seeder;

class SeosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('seos')->insert([
    			['page_name' => 'About','title'=>'About Us','keywords'=>'About Us','description'=>'About Us'],
    			['page_name' => 'Term And Condition','title'=>'Term And Condition','keywords'=>'Term And Condition','description'=>'Term And Condition'],
    			['page_name' => 'Privacy Policy','title'=>'Privacy Policy','keywords'=>'Privacy Policy','description'=>'Privacy Policy'],
                ['page_name' => 'Contact','title'=>'Contact page','keywords'=>'Contact call us','description'=>'call us now on our desk'],
    	]);
    }
}
